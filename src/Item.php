<?php

declare(strict_types=1);

namespace App;

final class Item
{
    public int $sellIn;
    public int $quality;

    public function __construct(public readonly string $name, int $sellIn, int $quality)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }
}
