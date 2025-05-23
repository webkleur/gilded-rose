<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enum\ItemNameEnum;
use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\AgedBrieUpdater;

final class AgedBrieUpdaterTest extends TestCase
{
    public function testQualityIncreasesOverTime(): void
    {
        $item = new Item(ItemNameEnum::AGED_BRIE->value, 2, 0);
        $updater = new AgedBrieUpdater();
        $updater->update($item);

        $this->assertEquals(1, $item->sell_in);
        $this->assertEquals(1, $item->quality);
    }

    public function testQualityDoesNotExceedFifty(): void
    {
        $item = new Item(ItemNameEnum::AGED_BRIE->value, 2, 50);
        $updater = new AgedBrieUpdater();
        $updater->update($item);

        $this->assertEquals(1, $item->sell_in);
        $this->assertEquals(50, $item->quality);
    }
}
