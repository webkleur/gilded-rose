<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enums\ItemNameEnum;
use App\Item;
use App\ItemUpdater\ConjuredItemUpdater;
use App\ItemUpdater\DefaultItemUpdater;
use PHPUnit\Framework\TestCase;

final class ConjuredItemUpdaterTest extends TestCase
{
    public function testQualityDegradesTwiceAsFast(): void
    {
        $item = new Item(name: ItemNameEnum::CONJURED_MANA_CAKE->value, sellIn: 3, quality: 6);
        $updater = new ConjuredItemUpdater(inner: new DefaultItemUpdater());
        $updater->update(item: $item);

        $this->assertEquals(2, $item->sellIn);
        $this->assertEquals(4, $item->quality);
    }

    public function testQualityDoesNotGoNegative(): void
    {
        $item = new Item(name: ItemNameEnum::CONJURED_MANA_CAKE->value, sellIn: 3, quality: 1);
        $updater = new ConjuredItemUpdater(inner: new DefaultItemUpdater());
        $updater->update(item: $item);

        $this->assertEquals(2, $item->sellIn);
        $this->assertEquals(0, $item->quality);
    }
}
