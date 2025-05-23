<?php

declare(strict_types=1);

namespace App;

use App\Factory\ItemUpdaterFactory;

class GildedRose
{
    private readonly array $items;

    private readonly ItemUpdaterFactory $updaterFactory;

    public function __construct(array $items)
    {
        $this->items = $items;
        $this->updaterFactory = new ItemUpdaterFactory();
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $updater = $this->updaterFactory->getUpdater(item: $item);
            $updater->update($item);
        }
    }
}
