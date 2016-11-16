<?php

namespace app\services;

use app\models\SearchData;

class SearchDataManager
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