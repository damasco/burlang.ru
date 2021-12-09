<?php

namespace app\services;

use app\models\SearchData;
use yii\db\Exception;

class SearchDataService
{
    public function add(string $word, int $type): void
    {
        $model = new SearchData();
        $model->name = $word;
        $model->type = $type;
        if (!$model->save()) {
            throw new Exception(\Yii::t('app', 'Can not add search data'));
        }
    }
}
