<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use App\Enum\ItemNameEnum;
use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\SulfurasUpdater;

final class SulfurasUpdaterTest extends TestCase
{
    public function testSulfurasNeverChanges(): void
    {
        $item = new Item(ItemNameEnum::SULFURAS->value, 0, 80);
        $updater = new SulfurasUpdater();
        $updater->update($item);

        $this->assertEquals(0, $item->sell_in);
        $this->assertEquals(80, $item->quality);
    }
}
