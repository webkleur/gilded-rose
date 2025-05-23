<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

class ElixirOfTheMongooseUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->sellIn < 0 && $item->quality > 0) {
            $item->quality--;
        }
    }
}
