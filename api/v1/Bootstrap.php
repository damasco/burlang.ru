<?php

namespace app\api\v1;

use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        /** @var Module $module */
        if ($app->hasModule('v1') && ($module = $app->getModule('v1')) instanceof Module) {
            $configUrlRule = [
                'class' => 'yii\web\GroupUrlRule',
                'prefix' => $module->urlRulePrefix,
                'rules'  => $module->urlRules,
            ];

            $rule = Yii::createObject($configUrlRule);

            $app->urlManager->addRules([$rule], false);
        }
    }
}