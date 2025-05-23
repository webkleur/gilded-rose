<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enums\ItemNameEnum;
use App\Item;
use App\ItemUpdater\AgedBrieUpdater;
use PHPUnit\Framework\TestCase;

final class AgedBrieUpdaterTest extends TestCase
{
    public function testQualityIncreasesOverTime(): void
    {
        $item = new Item(name: ItemNameEnum::AGED_BRIE->value, sellIn: 2, quality: 0);
        $updater = new AgedBrieUpdater();
        $updater->update(item: $item);

        $this->assertEquals(1, $item->sellIn);
        $this->assertEquals(1, $item->quality);
    }

    public function testQualityDoesNotExceedFifty(): void
    {
        $item = new Item(name: ItemNameEnum::AGED_BRIE->value, sellIn: 2, quality: 50);
        $updater = new AgedBrieUpdater();
        $updater->update(item: $item);

        $this->assertEquals(1, $item->sellIn);
        $this->assertEquals(50, $item->quality);
    }
}
