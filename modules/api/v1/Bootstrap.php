<?php

namespace app\modules\api\v1;

use Yii;
use yii\base\BootstrapInterface;
use yii\web\GroupUrlRule;

class Bootstrap implements BootstrapInterface
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap($app)
    {
        /** @var Module $module */
        if ($app->hasModule('v1') && ($module = $app->getModule('v1')) instanceof Module) {
            $configUrlRule = [
                'class' => GroupUrlRule::class,
                'prefix' => $module->urlRulePrefix,
                'rules'  => $module->urlRules,
            ];

            /** @var GroupUrlRule $rule */
            $rule = Yii::createObject($configUrlRule);

            $app->urlManager->addRules([$rule], false);
        }
    }
}
