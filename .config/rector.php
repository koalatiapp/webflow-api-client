<?php

declare(strict_types=1);

use Koalati\Utils\Rector\MaintainSiteClientParityRector;
use Rector\Config\RectorConfig;


return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/../src',
    ]);

    $rectorConfig->rules([
        MaintainSiteClientParityRector::class,
    ]);
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses(false);
    $rectorConfig->indent("\t", 1);
};
