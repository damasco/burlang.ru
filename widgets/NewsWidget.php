<?php

namespace app\widgets;

use app\models\News;
use yii\base\Widget;

class NewsWidget extends Widget
{
    public function run()
    {
        $model = News::find()->orderBy('created_at DESC')->limit(3)->all();

        return $this->render('news', [
            'model' => $model
        ]);
    }
}