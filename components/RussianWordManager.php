<?php

namespace app\components;

use yii\db\Query;

class RussianWordManager
{
    /**
     * @param string $str
     * @return array
     */
    public function getWordWithFilter($str)
    {
        return (new Query())
            ->select(['name as value'])
            ->from('{{%russian_word}}')
            ->filterWhere(['like', 'name', $str . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->all();
    }
}