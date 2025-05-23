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
    public function testUpdateQualityTest(
        string $case,
        string $name,
        int $sellIn,
        int $quality,
        int $expectedSellIn,
        int $expectedQuality
    ): void {
        $item = new Item(name: $name, sell_in: $sellIn, quality: $quality);
        (new GildedRose(items: [$item]))->updateQuality();

        $this->assertSame($expectedSellIn, $item->sell_in, "[$case] Failed asserting sell_in");
        $this->assertSame($expectedQuality, $item->quality, "[$case] Failed asserting quality");
    }

    public function itemsProvider(): array
    {
        $L = Label::class;
        $I = ItemName::class;

        return [
            $L::AGED_BEFORE->value      => [$L::AGED_BEFORE->value, $I::AGED_BRIE->value, 10, 10, 9, 11],
            $L::AGED_SELL_IN->value     => [$L::AGED_SELL_IN->value, $I::AGED_BRIE->value, 0, 10, -1, 12],
            $L::AGED_AFTER->value       => [$L::AGED_AFTER->value, $I::AGED_BRIE->value, -5, 10, -6, 12],
            $L::AGED_BEFORE_MAX->value  => [$L::AGED_BEFORE_MAX->value, $I::AGED_BRIE->value, 5, 50, 4, 50],
            $L::AGED_SELL_IN_NEAR->value => [$L::AGED_SELL_IN_NEAR->value, $I::AGED_BRIE->value, 0, 49, -1, 50],
            $L::AGED_SELL_IN_MAX->value => [$L::AGED_SELL_IN_MAX->value, $I::AGED_BRIE->value, 0, 50, -1, 50],
            $L::AGED_AFTER_MAX->value   => [$L::AGED_AFTER_MAX->value, $I::AGED_BRIE->value, -10, 50, -11, 50],

            $L::PASS_BEFORE->value      => [$L::PASS_BEFORE->value, $I::BACKSTAGE_PASS->value, 10, 10, 9, 12],
            $L::PASS_MORE_THAN_10->value => [$L::PASS_MORE_THAN_10->value, $I::BACKSTAGE_PASS->value, 11, 10, 10, 11],
            $L::PASS_FIVE_DAYS->value   => [$L::PASS_FIVE_DAYS->value, $I::BACKSTAGE_PASS->value, 5, 10, 4, 13],
            $L::PASS_SELL_IN->value     => [$L::PASS_SELL_IN->value, $I::BACKSTAGE_PASS->value, 0, 10, -1, 0],
            $L::PASS_CLOSE_MAX->value   => [$L::PASS_CLOSE_MAX->value, $I::BACKSTAGE_PASS->value, 10, 50, 9, 50],
            $L::PASS_VERY_CLOSE->value  => [$L::PASS_VERY_CLOSE->value, $I::BACKSTAGE_PASS->value, 5, 50, 4, 50],
            $L::PASS_AFTER->value       => [$L::PASS_AFTER->value, $I::BACKSTAGE_PASS->value, -5, 50, -6, 0],

            $L::SULF_BEFORE->value      => [$L::SULF_BEFORE->value, $I::SULFURAS->value, 10, 80, 10, 80],
            $L::SULF_SELL_IN->value     => [$L::SULF_SELL_IN->value, $I::SULFURAS->value, 0, 80, 0, 80],
            $L::SULF_AFTER->value       => [$L::SULF_AFTER->value, $I::SULFURAS->value, -1, 80, -1, 80],

            $L::ELIX_BEFORE->value      => [$L::ELIX_BEFORE->value, $I::ELIXIR_OF_THE_MONGOOSE->value, 10, 10, 9, 9],
            $L::ELIX_SELL_IN->value     => [$L::ELIX_SELL_IN->value, $I::ELIXIR_OF_THE_MONGOOSE->value, 0, 10, -1, 8],
        ];
    }
}
