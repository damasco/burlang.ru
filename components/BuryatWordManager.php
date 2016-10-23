<?php

namespace app\components;

use app\helpers\StringHelper;
use app\models\BuryatWord;
use app\models\SearchData;

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
        if (StringHelper::isWord($q)) {
            /** @var BuryatWord $word */
            $word = BuryatWord::findOne(['name' => $q]);

            if ($word && $word->getTranslations()->exists()) {
                return $word->getTranslations()->asArray()->all();
            } else {
                (new SearchDataCreator($q, SearchData::BURYAT_WORD_TYPE))->execute();
                return null;
            }
        } else {
            return false;
        }
    }
}