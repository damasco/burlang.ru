<?php

namespace app\bootstrap;

use app\components\DeviceDetect\DeviceDetect;
use app\components\DeviceDetect\DeviceDetectInterface;
use app\services\BuryatNameManager;
use Detection\MobileDetect;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\grid\ActionColumn;

class ContainerBootstrap implements BootstrapInterface
{
    /**
     * @param Application $app
     */
    public function bootstrap($app)
    {
        $container = Yii::$container;

        $container->set(ActionColumn::class, \app\components\Grid\ActionColumn::class);

        $container->setSingleton(DeviceDetectInterface::class, function () {
            $mobileDetect = new MobileDetect();
            return new DeviceDetect(
                $mobileDetect->isMobile(),
                $mobileDetect->isTablet()
            );
        });

        $container->set(BuryatNameManager::class, BuryatNameManager::class);
    }
}
