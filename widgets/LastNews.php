<?php

namespace app\widgets;

use app\models\News;
use Yii;
use yii\base\Widget;

class LastNews extends Widget
{
    public int $limit = 3;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('last-news', [
            'lastNews' => News::find()
                ->active()
                ->orderBy('created_at DESC')
                ->limit($this->limit)
                ->all()
        ]);
    }
}
