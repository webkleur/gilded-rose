<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

class ElixirOfTheMongooseUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->sell_in < 0 && $item->quality > 0) {
            $item->quality--;
        }
    }
}
