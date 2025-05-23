<?php

declare(strict_types=1);

namespace Tests;

use App\Enums\ItemNameEnum as ItemName;
use App\Enums\TestLabelEnum as Label;
use App\GildedRose;
use App\Item;
use PHPUnit\Framework\TestCase;

final class GildedRoseTest extends TestCase
{
    /**
     * @dataProvider itemsProvider
     * @testdox Update quality test with data set "$case"
     */
    public function testUpdateQualityTest(
        string $case,
        string $name,
        int $sellIn,
        int $quality,
        int $expectedSellIn,
        int $expectedQuality
    ): void {
        $item = new Item(name: $name, sellIn: $sellIn, quality: $quality);
        (new GildedRose(items: [$item]))->updateQuality();

        $this->assertSame($expectedSellIn, $item->sellIn, "[$case] Failed asserting sell_in");
        $this->assertSame($expectedQuality, $item->quality, "[$case] Failed asserting quality");
    }

    public function itemsProvider(): array
    {
        $l = Label::class;
        $i = ItemName::class;

        return [
            $l::AGED_BEFORE->value      => [$l::AGED_BEFORE->value, $i::AGED_BRIE->value, 10, 10, 9, 11],
            $l::AGED_SELL_IN->value     => [$l::AGED_SELL_IN->value, $i::AGED_BRIE->value, 0, 10, -1, 12],
            $l::AGED_AFTER->value       => [$l::AGED_AFTER->value, $i::AGED_BRIE->value, -5, 10, -6, 12],
            $l::AGED_BEFORE_MAX->value  => [$l::AGED_BEFORE_MAX->value, $i::AGED_BRIE->value, 5, 50, 4, 50],
            $l::AGED_SELL_IN_NEAR->value => [$l::AGED_SELL_IN_NEAR->value, $i::AGED_BRIE->value, 0, 49, -1, 50],
            $l::AGED_SELL_IN_MAX->value => [$l::AGED_SELL_IN_MAX->value, $i::AGED_BRIE->value, 0, 50, -1, 50],
            $l::AGED_AFTER_MAX->value   => [$l::AGED_AFTER_MAX->value, $i::AGED_BRIE->value, -10, 50, -11, 50],

            $l::PASS_BEFORE->value      => [$l::PASS_BEFORE->value, $i::BACKSTAGE_PASS->value, 10, 10, 9, 12],
            $l::PASS_MORE_THAN_10->value => [$l::PASS_MORE_THAN_10->value, $i::BACKSTAGE_PASS->value, 11, 10, 10, 11],
            $l::PASS_FIVE_DAYS->value   => [$l::PASS_FIVE_DAYS->value, $i::BACKSTAGE_PASS->value, 5, 10, 4, 13],
            $l::PASS_SELL_IN->value     => [$l::PASS_SELL_IN->value, $i::BACKSTAGE_PASS->value, 0, 10, -1, 0],
            $l::PASS_CLOSE_MAX->value   => [$l::PASS_CLOSE_MAX->value, $i::BACKSTAGE_PASS->value, 10, 50, 9, 50],
            $l::PASS_VERY_CLOSE->value  => [$l::PASS_VERY_CLOSE->value, $i::BACKSTAGE_PASS->value, 5, 50, 4, 50],
            $l::PASS_AFTER->value       => [$l::PASS_AFTER->value, $i::BACKSTAGE_PASS->value, -5, 50, -6, 0],

            $l::SULF_BEFORE->value      => [$l::SULF_BEFORE->value, $i::SULFURAS->value, 10, 80, 10, 80],
            $l::SULF_SELL_IN->value     => [$l::SULF_SELL_IN->value, $i::SULFURAS->value, 0, 80, 0, 80],
            $l::SULF_AFTER->value       => [$l::SULF_AFTER->value, $i::SULFURAS->value, -1, 80, -1, 80],

            $l::ELIX_BEFORE->value      => [$l::ELIX_BEFORE->value, $i::ELIXIR_OF_THE_MONGOOSE->value, 10, 10, 9, 9],
            $l::ELIX_SELL_IN->value     => [$l::ELIX_SELL_IN->value, $i::ELIXIR_OF_THE_MONGOOSE->value, 0, 10, -1, 8],
        ];
    }
}
