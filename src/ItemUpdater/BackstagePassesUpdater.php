<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;
use App\Traits\QualityBounded;

class BackstagePassesUpdater implements ItemUpdaterInterface
{
    use QualityBounded;

    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = $this->resetQuality();
            return;
        }

        $item->quality = $this->increaseQuality(quality: $item->quality);

        if ($item->sellIn < 10) {
            $item->quality = $this->increaseQuality(quality: $item->quality);
        }

        if ($item->sellIn < 5) {
            $item->quality = $this->increaseQuality(quality: $item->quality);
        }
    }
}
