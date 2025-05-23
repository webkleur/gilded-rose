<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

class ConjuredItemUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        $degradation = ($item->sellIn < 0) ? 4 : 2;
        $item->quality = max(0, $item->quality - $degradation);
    }
}
