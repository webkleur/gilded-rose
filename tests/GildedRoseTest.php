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
            new Item(ItemNameEnum::AGED_BRIE->value, 2, 0),
            new Item(ItemNameEnum::BACKSTAGE_PASS->value, 15, 20),
            new Item(ItemNameEnum::SULFURAS->value, 0, 80),
            new Item(ItemNameEnum::CONJURED_MANA_CAKE->value, 3, 6),
            new Item(ItemNameEnum::DEXTERITY_VEST->value, 10, 20),
            new Item(ItemNameEnum::ELIXIR_OF_THE_MONGOOSE->value, 5, 7),
        ];

        $gildedRose = new GildedRose($items);
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
