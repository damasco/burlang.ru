<?php

namespace app\bootstrap;

use app\services\BuryatWordManager;
use app\services\RussianWordManager;
use app\services\SearchDataManager;
use yii\base\BootstrapInterface;
use app\services\BuryatNameManager;
use yii\grid\ActionColumn;

class ContainerBootstrap implements BootstrapInterface
{
    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        // default classes
        $container->set(ActionColumn::class, \app\grid\ActionColumn::class);

        // services
        $container->set(BuryatNameManager::class);
        $container->set(BuryatWordManager::class);
        $container->set(RussianWordManager::class);
        $container->set(SearchDataManager::class);
    }
}
