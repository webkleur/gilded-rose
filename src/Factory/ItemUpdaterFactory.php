<?php

declare(strict_types=1);

namespace App\Factory;

use App\Enum\ItemNameEnum;
use App\Item;
use App\ItemUpdater\{AgedBrieUpdater,
    BackstagePassesUpdater,
    ElixirOfTheMongooseUpdater,
    SulfurasUpdater,
    ConjuredItemUpdater,
    DefaultItemUpdater,
    ItemUpdaterInterface
};

class ItemUpdaterFactory
{
    public function getUpdater(Item $item): ItemUpdaterInterface
    {
        $itemName = ItemNameEnum::tryFrom($item->name);

        return match ($itemName) {
            ItemNameEnum::AGED_BRIE => new AgedBrieUpdater(),
            ItemNameEnum::BACKSTAGE_PASS => new BackstagePassesUpdater(),
            ItemNameEnum::SULFURAS => new SulfurasUpdater(),
            ItemNameEnum::CONJURED_MANA_CAKE => new ConjuredItemUpdater(),
            ItemNameEnum::ELIXIR_OF_THE_MONGOOSE => new ElixirOfTheMongooseUpdater(),
            default => str_contains(strtolower($item->name), 'conjured')
                ? new ConjuredItemUpdater()
                : new DefaultItemUpdater(),
        };
    }
}

