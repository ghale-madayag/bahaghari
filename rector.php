<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\CodeQuality\Rector\Namespace_\ImportFullyQualifiedNamesRector;
use Rector\CodingStyle\Rector\Stmt\AddDeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/administrator',
        __DIR__ . '/inc',
    ])
    // Apply PHP upgrades
    ->withSets([
        LevelSetList::UP_TO_PHP_80, // Adjust if upgrading to PHP 8.1 or higher
    ])
    ->withTypeCoverageLevel(0)
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0);
