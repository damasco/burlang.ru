<?php

namespace app\bootstrap;

use yii\base\BootstrapInterface;
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
    }
}
