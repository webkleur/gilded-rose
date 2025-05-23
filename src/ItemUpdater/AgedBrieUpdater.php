<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

class AgedBrieUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality < 50) {
            $item->quality++;
            if ($item->sellIn < 0 && $item->quality < 50) {
                $item->quality++;
            }
        }
    }
}
