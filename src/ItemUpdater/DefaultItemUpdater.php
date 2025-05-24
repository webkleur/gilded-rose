<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;
use App\Traits\QualityBounded;

class DefaultItemUpdater implements ItemUpdaterInterface
{
    use QualityBounded;

    public function update(Item $item): void
    {
        $item->sellIn--;

        $item->quality = $this->decreaseQuality(quality: $item->quality);

        if ($item->sellIn < 0) {
            $item->quality = $this->decreaseQuality(quality: $item->quality);
        }
    }
}
