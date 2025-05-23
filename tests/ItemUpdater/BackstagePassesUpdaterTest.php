<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enums\ItemNameEnum;
use App\Item;
use App\ItemUpdater\BackstagePassesUpdater;
use PHPUnit\Framework\TestCase;

final class BackstagePassesUpdaterTest extends TestCase
{
    public function testQualityIncreasesByOneWhenMoreThanTenDays(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sellIn: 15, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(14, $item->sellIn);
        $this->assertEquals(21, $item->quality);
    }

    public function testQualityIncreasesByTwoWhenTenDaysOrLess(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sellIn: 10, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(9, $item->sellIn);
        $this->assertEquals(22, $item->quality);
    }

    public function testQualityIncreasesByThreeWhenFiveDaysOrLess(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sellIn: 5, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(4, $item->sellIn);
        $this->assertEquals(23, $item->quality);
    }

    public function testQualityDropsToZeroAfterConcert(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sellIn: 0, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(-1, $item->sellIn);
        $this->assertEquals(0, $item->quality);
    }
}
