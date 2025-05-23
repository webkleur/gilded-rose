<?php

declare(strict_types=1);

namespace App\Enums;

enum ItemNameEnum: string
{
    case AGED_BRIE = 'Aged Brie';
    case BACKSTAGE_PASS = 'Backstage passes to a TAFKAL80ETC concert';
    case SULFURAS = 'Sulfuras, Hand of Ragnaros';
    case CONJURED_MANA_CAKE = 'Conjured Mana Cake';
    case DEXTERITY_VEST = '+5 Dexterity Vest';
    case ELIXIR_OF_THE_MONGOOSE = 'Elixir of the Mongoose';
    case CONJURED = 'conjured';
}
