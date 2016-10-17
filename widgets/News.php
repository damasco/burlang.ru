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
        $query = Model::find();

        if (!Yii::$app->user->can('adminNews')) {
            $query->where(['active' => 1]);
        }

        /** @var News $model */
        $model = $query->orderBy('created_at DESC')->limit(Yii::$app->params['widget.news.limit'])->all();

        return $this->render('news', [
            'model' => $model
        ]);
    }
}