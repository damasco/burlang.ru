<?php

namespace app\api\v1;

use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        /** @var Module $module */
        if ($app->hasModule('v1') && ($module = $app->getModule('v1')) instanceof Module) {
            $configUrlRule = [
                'prefix' => $module->urlPrefix,
                'rules'  => $module->urlRules,
            ];

            if ($module->urlPrefix != 'v1') {
                $configUrlRule['routePrefix'] = 'v1';
            }

            $configUrlRule['class'] = 'yii\web\GroupUrlRule';
            $rule = Yii::createObject($configUrlRule);

            $app->urlManager->addRules([$rule], false);
        }
    }
}