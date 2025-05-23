<?php

declare(strict_types=1);

namespace App;

final class Item
{
    public int $sell_in;
    public int $quality;

    public function __construct(public readonly string $name, int $sell_in, int $quality)
    {
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
