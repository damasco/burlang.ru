<?php

namespace app\services;

use app\models\BuryatWord;

class BuryatWordService
{
    public function find(string $q, int $limit = 10): array
    {
        return BuryatWord::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit($limit)
            ->asArray()
            ->all();
    }

    public function findTranslations(string $q): array
    {
        $word = BuryatWord::findOne(['name' => $q]);
        if (!$word) {
            return [];
        }
        return $word->getTranslations()
            ->select(['name'])
            ->asArray()
            ->column();
    }
}
