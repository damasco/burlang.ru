<?php

namespace app\components;

use app\models\SearchData;
use app\helpers\StringHelper;
use app\models\RussianWord;

class RussianWordManager
{
    /**
     * @param string $str
     * @return array
     */
    public function getWordsWithFilter($str)
    {
        return RussianWord::find()
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
            /** @var RussianWord $word */
            $word = RussianWord::findOne(['name' => $str]);

            if ($word && $word->getTranslations()->exists()) {
                return $word->getTranslations()->asArray()->all();
            } else {
                \Yii::createObject('app\components\SearchDataCreator', [$str, SearchData::RUSSIAN_WORD_TYPE])->execute();
                return null;
            }
        } else {
            return false;
        }
    }
}