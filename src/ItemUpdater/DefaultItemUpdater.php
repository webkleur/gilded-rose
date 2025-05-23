<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

class DefaultItemUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        $degradation = ($item->sellIn < 0) ? 2 : 1;
        $item->quality = max(0, $item->quality - $degradation);
    }
}
