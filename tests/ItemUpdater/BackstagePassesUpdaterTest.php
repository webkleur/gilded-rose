<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enum\ItemNameEnum;
use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\BackstagePassesUpdater;

final class BackstagePassesUpdaterTest extends TestCase
{
    public function testQualityIncreasesByOneWhenMoreThanTenDays(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sell_in: 15, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(14, $item->sell_in);
        $this->assertEquals(21, $item->quality);
    }

    public function testQualityIncreasesByTwoWhenTenDaysOrLess(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sell_in: 10, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(22, $item->quality);
    }

    public function testQualityIncreasesByThreeWhenFiveDaysOrLess(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sell_in: 5, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(4, $item->sell_in);
        $this->assertEquals(23, $item->quality);
    }

    public function testQualityDropsToZeroAfterConcert(): void
    {
        $item = new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sell_in: 0, quality: 20);
        $updater = new BackstagePassesUpdater();
        $updater->update(item: $item);

        $this->assertEquals(-1, $item->sell_in);
        $this->assertEquals(0, $item->quality);
    }
}
