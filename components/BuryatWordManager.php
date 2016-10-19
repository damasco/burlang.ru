<?php

namespace app\components;

use yii\db\Query;

class BuryatWordManager
{
    /**
     * @param string $str
     * @return array
     */
    public function getWordsWithFilter($str)
    {
        return (new Query())
            ->select(['name as value'])
            ->from('{{%buryat_word}}')
            ->filterWhere(['like', 'name', $str . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->all();
    }
}