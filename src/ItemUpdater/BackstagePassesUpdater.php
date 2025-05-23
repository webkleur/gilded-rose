<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

class BackstagePassesUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = 0;
            return;
        }

        if ($item->quality < 50) {
            $item->quality++;
            if ($item->sellIn < 10 && $item->quality < 50) {
                $item->quality++;
            }
            if ($item->sellIn < 5 && $item->quality < 50) {
                $item->quality++;
            }
        }
    }
}
