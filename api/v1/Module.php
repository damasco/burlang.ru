<?php

namespace app\api\v1;

/**
 * v1 module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\api\v1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * @var string The prefix for user module URL.
     *
     * @See [[GroupUrlRule::prefix]]
     */
    public $urlRulePrefix = 'v1';

    /** @var array The rules to be used in URL management. */
    public $urlRules = [
        'names/<action>' => 'buryat-name/<action>',
    ];
}
