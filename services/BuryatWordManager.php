<?php

namespace app\services;

use app\models\BuryatWord;
use app\models\SearchData;
use yii\helpers\StringHelper;

class BuryatWordManager
{
    /**
     * @param string $q
     * @return array
     */
    public function getWordsWithFilter($q)
    {
        return BuryatWord::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->asArray()
            ->all();
    }

    /**
     * @param string $q
     * @return boolean|null|array
     */
    public function getTranslations($q)
    {
        if (StringHelper::countWords($q) === 1) {
            /** @var BuryatWord $word */
            $word = BuryatWord::findOne(['name' => $q]);

            if ($word && $word->getTranslations()->exists()) {
                return $word->getTranslations()->asArray()->all();
            }
            \Yii::createObject(SearchDataManager::class)->insert($q, SearchData::BURYAT_WORD_TYPE);
            return null;
        }
        return false;
    }
}
