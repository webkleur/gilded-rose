<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enum\ItemNameEnum;
use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\DefaultItemUpdater;

final class DefaultItemUpdaterTest extends TestCase
{
    public function testQualityDegradesByOneBeforeSellIn(): void
    {
        $item = new Item(name: ItemNameEnum::DEXTERITY_VEST->value, sell_in: 10, quality: 20);
        $updater = new DefaultItemUpdater();
        $updater->update(item: $item);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(19, $item->quality);
    }

    public function testQualityDegradesByTwoAfterSellIn(): void
    {
        $item = new Item(name: ItemNameEnum::DEXTERITY_VEST->value, sell_in: 0, quality: 20);
        $updater = new DefaultItemUpdater();
        $updater->update(item: $item);

        $this->assertEquals(-1, $item->sell_in);
        $this->assertEquals(18, $item->quality);
    }

    public function testQualityDoesNotGoNegative(): void
    {
        $item = new Item(name: ItemNameEnum::DEXTERITY_VEST->value, sell_in: 10, quality: 0);
        $updater = new DefaultItemUpdater();
        $updater->update(item: $item);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(0, $item->quality);
    }
}
