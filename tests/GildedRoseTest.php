<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Item;
use App\GildedRose;

final class GildedRoseTest extends TestCase
{
    public function testUpdateQuality(): void
    {
        $items = [
            new Item('Aged Brie', 2, 0),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Conjured Mana Cake', 3, 6),
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Elixir of the Mongoose', 5, 7),
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
