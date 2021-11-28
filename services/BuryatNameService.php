<?php

namespace app\services;

use app\models\BuryatName;
use InvalidArgumentException;

class BuryatNameService
{
    public function findFirstLetters(): array
    {
        return BuryatName::find()
            ->select(['letter' => 'LEFT(name, 1)', 'amount' => 'COUNT(id)'])
            ->groupBy('letter')
            ->orderBy('letter')
            ->asArray()
            ->all();
    }

    /**
     * @param string $letter
     * @return array
     * @throws InvalidArgumentException
     */
    public function findNamesByFirstLetter(string $letter): array
    {
        if (mb_strlen($letter) !== 1) {
            throw new InvalidArgumentException(\Yii::t('app', 'A letter is not one symbol'));
        }
        return BuryatName::find()
            ->select('name')
            ->where(['like', 'name', $letter . '%', false])
            ->column();
    }
}
