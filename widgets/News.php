<?php

namespace app\widgets;

use Yii;
use app\models\News as Model;
use yii\base\Widget;

class News extends Widget
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var News $model */
        $model = Model::find()
            ->where(['active' => 1])
            ->orderBy('created_at DESC')
            ->limit(Yii::$app->params['widget.news.limit'])
            ->all();

        return $this->render('news', [
            'model' => $model
        ]);
    }
}