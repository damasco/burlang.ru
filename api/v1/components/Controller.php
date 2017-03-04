<?php

namespace app\api\v1\components;

use yii\helpers\ArrayHelper;
use yii\filters\Cors;

class Controller extends \yii\rest\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::class,
            ],
        ]);
    }
}