<?php

declare(strict_types=1);

namespace App\ItemUpdater;

use App\Item;
use App\Traits\QualityBounded;

class ConjuredItemUpdater implements ItemUpdaterInterface
{
    use QualityBounded;

    public function __construct(private readonly ItemUpdaterInterface $inner)
    {
    }

    public function update(Item $item): void
    {
        $this->inner->update($item);
        $item->quality = $this->decreaseQuality(quality: $item->quality);
    }
}
