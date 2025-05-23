<?php

declare(strict_types=1);

namespace Tests\ItemUpdater;

use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemUpdater\SulfurasUpdater;

final class SulfurasUpdaterTest extends TestCase
{
    public function testSulfurasNeverChanges(): void
    {
        $item = new Item('Sulfuras, Hand of Ragnaros', 0, 80);
        $updater = new SulfurasUpdater();
        $updater->update($item);

        $this->assertEquals(0, $item->sell_in);
        $this->assertEquals(80, $item->quality);
    }
}
