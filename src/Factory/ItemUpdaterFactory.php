<?php

declare(strict_types=1);

namespace App\Factory;

use App\Item;
use App\ItemUpdater\{
    AgedBrieUpdater,
    BackstagePassesUpdater,
    SulfurasUpdater,
    ConjuredItemUpdater,
    DefaultItemUpdater,
    ItemUpdaterInterface
};

class ItemUpdaterFactory
{
    public function getUpdater(Item $item): ItemUpdaterInterface
    {
        return match ($item->name) {
            'Aged Brie' => new AgedBrieUpdater(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassesUpdater(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasUpdater(),
            default => str_contains(
                strtolower($item->name),
                'conjured'
            ) ? new ConjuredItemUpdater() : new DefaultItemUpdater(),
        };
    }
}
