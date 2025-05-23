<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

class SulfurasUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        // Sulfuras does not change
    }
}
