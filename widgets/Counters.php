<?php

namespace app\widgets;

use yii\base\Widget;

class Counters extends Widget
{
    public function run(): string
    {
        return !YII_DEBUG && YII_ENV_PROD
            ? $this->render('counters')
            : '';
    }
}
