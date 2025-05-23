<?php

declare(strict_types=1);

namespace Tests;

use App\Enum\ItemNameEnum;
use PHPUnit\Framework\TestCase;
use App\Item;
use App\GildedRose;

final class GildedRoseTest extends TestCase
{
    public function testUpdateQuality(): void
    {
        $items = [
            new Item(name: ItemNameEnum::AGED_BRIE->value, sell_in: 2, quality: 0),
            new Item(name: ItemNameEnum::BACKSTAGE_PASS->value, sell_in: 15, quality: 20),
            new Item(name: ItemNameEnum::SULFURAS->value, sell_in: 0, quality: 80),
            new Item(name: ItemNameEnum::CONJURED_MANA_CAKE->value, sell_in: 3, quality: 6),
            new Item(name: ItemNameEnum::DEXTERITY_VEST->value, sell_in: 10, quality: 20),
            new Item(name: ItemNameEnum::ELIXIR_OF_THE_MONGOOSE->value, sell_in: 5, quality: 7),
        ];

        $gildedRose = new GildedRose(items: $items);
        $gildedRose->updateQuality();

        $this->assertEquals(1, $items[0]->sell_in);
        $this->assertEquals(1, $items[0]->quality);

        $this->assertEquals(14, $items[1]->sell_in);
        $this->assertEquals(21, $items[1]->quality);

        $this->assertEquals(0, $items[2]->sell_in);
        $this->assertEquals(80, $items[2]->quality);

        $this->assertEquals(2, $items[3]->sell_in);
        $this->assertEquals(4, $items[3]->quality);

        $this->assertEquals(9, $items[4]->sell_in);
        $this->assertEquals(19, $items[4]->quality);

        $this->assertEquals(4, $items[5]->sell_in);
        $this->assertEquals(6, $items[5]->quality);
    }
}
