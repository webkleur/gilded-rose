<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enum\ItemNameEnum;
use App\Item;
use App\ItemUpdater\ElixirOfTheMongooseUpdater;
use PHPUnit\Framework\TestCase;

final class ElixirOfTheMongooseUpdaterTest extends TestCase
{
    public function testQualityDecreasesByOneBeforeSellInDate(): void
    {
        $item = new Item(name: ItemNameEnum::ELIXIR_OF_THE_MONGOOSE->value, sell_in: 5, quality: 7);
        $updater = new ElixirOfTheMongooseUpdater();
        $updater->update(item: $item);

        $this->assertSame(4, $item->sell_in);
        $this->assertSame(6, $item->quality);
    }

    public function testQualityDecreasesByTwoAfterSellInDate(): void
    {
        $item = new Item(name: ItemNameEnum::ELIXIR_OF_THE_MONGOOSE->value, sell_in: 0, quality: 7);
        $updater = new ElixirOfTheMongooseUpdater();
        $updater->update(item: $item);

        $this->assertSame(-1, $item->sell_in);
        $this->assertSame(5, $item->quality);
    }

    public function testQualityDoesNotGoNegative(): void
    {
        $item = new Item(name: ItemNameEnum::ELIXIR_OF_THE_MONGOOSE->value, sell_in: 0, quality: 0);
        $updater = new ElixirOfTheMongooseUpdater();
        $updater->update(item: $item);

        $this->assertSame(-1, $item->sell_in);
        $this->assertSame(0, $item->quality);
    }
}
