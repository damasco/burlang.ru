<?php

namespace app\services;

use app\models\SearchData;

class SearchDataManager
{
    /**
     * Insert search data
     * @param string $word
     * @param int $type
     *
     * @return void
     */
    public function insert($word, $type)
    {
        \Yii::createObject(['class' => SearchData::class, 'name' => $word, 'type' => $type])->save();
    }
}
