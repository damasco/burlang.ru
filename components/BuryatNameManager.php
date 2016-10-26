<?php

namespace app\components;

use app\models\BuryatName;
use yii\base\Object;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use Yii;

class BuryatNameManager extends Object
{
    /**
     * @return array
     */
    public function getFirstLetters()
    {
        return BuryatName::find()
            ->select(['letter' => 'LEFT(name, 1)', 'amount' => 'COUNT(id)'])
            ->groupBy('letter')
            ->orderBy('letter')
            ->asArray()
            ->all();
    }

    /**
     * @param null|string $letter
     * @return array
     * @throws NotFoundHttpException
     */
    public function getNames($letter)
    {
        $alphabet = $this->getFirstLetters();
        $names = [];

        if ($letter !== null) {
            if (!in_array($letter, ArrayHelper::getColumn($alphabet, 'letter'))) {
                throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
            }
            $names = BuryatName::find()
                ->where(['like', 'name', $letter . '%', false])
                ->asArray()
                ->all();
        }

        return $names;
    }
}
