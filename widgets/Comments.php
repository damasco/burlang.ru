<?php

declare(strict_types=1);

namespace app\widgets;

use yii\base\Widget;

class Comments extends Widget
{
    public function run(): string
    {
        return !YII_DEBUG && YII_ENV_PROD
            ? $this->render('comments')
            : '';
    }
}
