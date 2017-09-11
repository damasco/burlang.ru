<?php

namespace app\bootstrap\Container;

use yii\base\BootstrapInterface;

class Container extends BootstrapInterface
{
    public function bootstrap()
    {
        $container = \Yii::$container;

        $container->set(app\services\BuryatNameManager::class);
        
    }
}
