<?php

declare(strict_types=1);

namespace App\Traits;

trait QualityBounded
{
    protected function increaseQuality(int $quality, int $amount = 1): int
    {
        return min(50, $quality + $amount);
    }

    protected function decreaseQuality(int $quality, int $amount = 1): int
    {
        return max(0, $quality - $amount);
    }

    protected function resetQuality(): int
    {
        return 0;
    }
}
