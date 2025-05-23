<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enums\ItemNameEnum;
use App\Item;
use App\ItemUpdater\SulfurasUpdater;
use PHPUnit\Framework\TestCase;

final class SulfurasUpdaterTest extends TestCase
{
    public function testSulfurasNeverChanges(): void
    {
        $item = new Item(name: ItemNameEnum::SULFURAS->value, sell_in: 0, quality: 80);
        $updater = new SulfurasUpdater();
        $updater->update(item: $item);

        $this->assertEquals(0, $item->sell_in);
        $this->assertEquals(80, $item->quality);
    }
}
