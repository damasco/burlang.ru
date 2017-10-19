<?php

namespace app\services;

use app\models\RussianWord;
use app\models\SearchData;
use yii\helpers\StringHelper;

class RussianWordManager
{
    /**
     * @param string $q
     * @return array
     */
    public function getWordsWithFilter($q)
    {
        return RussianWord::find()
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
            /** @var RussianWord $word */
            $word = RussianWord::findOne(['name' => $q]);

            if ($word && $word->getTranslations()->exists()) {
                return $word->getTranslations()->asArray()->all();
            }
            \Yii::createObject(SearchDataManager::class)->insert($q, SearchData::RUSSIAN_WORD_TYPE);
            return null;
        }
        return false;
    }
}
