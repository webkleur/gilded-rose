<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\BackstagePassesUpdater;

final class BackstagePassesUpdaterTest extends TestCase
{
    public function testQualityIncreasesByOneWhenMoreThanTenDays(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20);
        $updater = new BackstagePassesUpdater();
        $updater->update($item);

        $this->assertEquals(14, $item->sell_in);
        $this->assertEquals(21, $item->quality);
    }

    public function testQualityIncreasesByTwoWhenTenDaysOrLess(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 20);
        $updater = new BackstagePassesUpdater();
        $updater->update($item);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(22, $item->quality);
    }

    public function testQualityIncreasesByThreeWhenFiveDaysOrLess(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 20);
        $updater = new BackstagePassesUpdater();
        $updater->update($item);

        $this->assertEquals(4, $item->sell_in);
        $this->assertEquals(23, $item->quality);
    }

    public function testQualityDropsToZeroAfterConcert(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 0, 20);
        $updater = new BackstagePassesUpdater();
        $updater->update($item);

        $this->assertEquals(-1, $item->sell_in);
        $this->assertEquals(0, $item->quality);
    }
}
