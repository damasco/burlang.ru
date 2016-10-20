<?php

namespace app\components;

use app\helpers\StringHelper;
use app\models\BuryatWord;
use app\models\SearchData;

class BuryatWordManager
{
    /**
     * @param string $str
     * @return array
     */
    public function getWordsWithFilter($str)
    {
        return BuryatWord::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', $str . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->asArray()
            ->all();
    }

    /**
     * @param string $str
     * @return boolean|null|array
     */
    public function getTranslations($str)
    {
        if (StringHelper::isWord($str)) {
            /** @var BuryatWord $word */
            $word = BuryatWord::findOne(['name' => $str]);

            if ($word && $word->getTranslations()->exists()) {
                return $word->getTranslations()->asArray()->all();
            } else {
                (new SearchDataCreator($str, SearchData::BURYAT_WORD_TYPE))->execute();
                return null;
            }
        } else {
            return false;
        }
    }
}