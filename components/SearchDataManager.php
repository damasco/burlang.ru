<?php

namespace app\components;

use app\models\SearchData;
use yii\base\Object;

class SearchDataManager extends Object
{
    /**
     * Insert search data
     * @param string $word
     * @param integer $type
     */
    public function insert($word, $type)
    {
        (new SearchData(['name' => $word, 'type' => $type]))->save();
    }
}