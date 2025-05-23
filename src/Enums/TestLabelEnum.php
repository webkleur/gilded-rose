<?php

declare(strict_types=1);

namespace App\Enums;

enum TestLabelEnum: string
{
    case AGED_BEFORE        = 'Aged Brie before sell in date';
    case AGED_SELL_IN       = 'Aged Brie sell in date';
    case AGED_AFTER         = 'Aged Brie after sell in date';
    case AGED_BEFORE_MAX    = 'Aged Brie before sell in date with maximum quality';
    case AGED_SELL_IN_NEAR  = 'Aged Brie sell in date near maximum quality';
    case AGED_SELL_IN_MAX   = 'Aged Brie sell in date with maximum quality';
    case AGED_AFTER_MAX     = 'Aged Brie after_sell in date with maximum quality';

    case PASS_BEFORE        = 'Backstage passes before sell in date';
    case PASS_MORE_THAN_10  = 'Backstage passes more than 10 days before sell in date';
    case PASS_FIVE_DAYS     = 'Backstage passes five days before sell in date';
    case PASS_SELL_IN       = 'Backstage passes sell in date';
    case PASS_CLOSE_MAX     = 'Backstage passes close to sell in date with maximum quality';
    case PASS_VERY_CLOSE    = 'Backstage passes very close to sell in date with maximum quality';
    case PASS_AFTER         = 'Backstage passes after sell in date';

    case SULF_BEFORE        = 'Sulfuras before sell in date';
    case SULF_SELL_IN       = 'Sulfuras sell in date';
    case SULF_AFTER         = 'Sulfuras after sell in date';

    case ELIX_BEFORE        = 'Elixir of the Mongoose before sell in date';
    case ELIX_SELL_IN       = 'Elixir of the Mongoose sell in date';
}
