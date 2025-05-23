<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use Rector\Set\ValueObject\SetList;
use SavinMikhail\AddNamedArgumentsRector\AddNamedArgumentsRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $rectorConfig->rule(DeclareStrictTypesRector::class);
    $rectorConfig->rule(AddNamedArgumentsRector::class);

    $rectorConfig->sets([
        SetList::TYPE_DECLARATION,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::PHP_81,
    ]);
};
