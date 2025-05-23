<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;

interface ItemUpdaterInterface
{
    public function update(Item $item): void;
}
