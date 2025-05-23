<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\DefaultItemUpdater;

final class DefaultItemUpdaterTest extends TestCase
{
    public function testQualityDegradesByOneBeforeSellIn(): void
    {
        $item = new Item('+5 Dexterity Vest', 10, 20);
        $updater = new DefaultItemUpdater();
        $updater->update($item);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(19, $item->quality);
    }

    public function testQualityDegradesByTwoAfterSellIn(): void
    {
        $item = new Item('+5 Dexterity Vest', 0, 20);
        $updater = new DefaultItemUpdater();
        $updater->update($item);

        $this->assertEquals(-1, $item->sell_in);
        $this->assertEquals(18, $item->quality);
    }

    public function testQualityDoesNotGoNegative(): void
    {
        $item = new Item('+5 Dexterity Vest', 10, 0);
        $updater = new DefaultItemUpdater();
        $updater->update($item);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(0, $item->quality);
    }
}
