<?php

namespace app\services;

use app\models\RussianWord;

class RussianWordService
{
    public function find(string $q, int $limit = 10): array
    {
        return RussianWord::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit($limit)
            ->asArray()
            ->all();
    }

    public function findTranslations(string $q): array
    {
        $word = RussianWord::findOne(['name' => $q]);
        if (!$word) {
            return [];
        }
        return $word->getTranslations()
            ->select('name')
            ->asArray()
            ->column();
    }
}
