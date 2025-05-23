<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enum\ItemNameEnum;
use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\ConjuredItemUpdater;

final class ConjuredItemUpdaterTest extends TestCase
{
    public function testQualityDegradesTwiceAsFast(): void
    {
        $item = new Item(name: ItemNameEnum::CONJURED_MANA_CAKE->value, sell_in: 3, quality: 6);
        $updater = new ConjuredItemUpdater();
        $updater->update(item: $item);

        $this->assertEquals(2, $item->sell_in);
        $this->assertEquals(4, $item->quality);
    }

    public function testQualityDoesNotGoNegative(): void
    {
        $item = new Item(name: ItemNameEnum::CONJURED_MANA_CAKE->value, sell_in: 3, quality: 1);
        $updater = new ConjuredItemUpdater();
        $updater->update(item: $item);

        $this->assertEquals(2, $item->sell_in);
        $this->assertEquals(0, $item->quality);
    }
}
