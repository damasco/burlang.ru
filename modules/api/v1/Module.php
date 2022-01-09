<?php

namespace app\modules\api\v1;

class Module extends \yii\base\Module
{
    /**
     * {@inheritDoc}
     */
    public $controllerNamespace = 'app\modules\api\v1\controllers';

    public array $urlRules = [
        'api/v1/names/<action>' => 'api/v1/buryat-name/<action>',
        'api/v1/buryat-word/<action>' => 'api/v1/buryat-word/<action>',
        'api/v1/russian-word/<action>' => 'api/v1/russian-word/<action>',
    ];
}
