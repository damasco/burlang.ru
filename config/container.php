<?php

use app\components\DeviceDetect\DeviceDetect;
use app\components\DeviceDetect\DeviceDetectInterface;
use app\services\BuryatNameService;
use app\services\BuryatWordService;
use app\services\RussianWordService;
use app\services\SearchDataService;
use Detection\MobileDetect;
use yii\grid\ActionColumn;

return [
    'definitions' => [
        ActionColumn::class => \app\components\Grid\ActionColumn::class,
    ],
    'singletons' => [
        DeviceDetectInterface::class => function () {
            $mobileDetect = new MobileDetect();
            return new DeviceDetect(
                $mobileDetect->isMobile(),
                $mobileDetect->isTablet()
            );
        },
        BuryatNameService::class => BuryatNameService::class,
        BuryatWordService::class => BuryatWordService::class,
        RussianWordService::class => RussianWordService::class,
        SearchDataService::class => SearchDataService::class,
    ],
];
