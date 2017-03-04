<?php

namespace app\api\v1\controllers;

use app\services\BuryatWordManager;
use Yii;
use app\api\v1\models\BuryatWord;
use yii\web\NotFoundHttpException;
use app\api\v1\components\Controller;

class BuryatWordController extends Controller
{
    /**
     * Get translate
     * @param string $q
     * @return null|BuryatWord
     * @throws NotFoundHttpException
     */
    public function actionTranslate($q)
    {
        if (($model = BuryatWord::findOne(['name' => $q])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
    }

    /**
     * Get list words
     * @param string $q
     * @return array
     */
    public function actionSearch($q)
    {
        return Yii::createObject(BuryatWordManager::class)->getWordsWithFilter($q);
    }
}