<?php

namespace app\api\v1\controllers;

use app\api\v1\components\Controller;
use app\api\v1\models\RussianWord;
use app\services\RussianWordManager;
use Yii;
use yii\web\NotFoundHttpException;

class RussianWordController extends Controller
{
    /**
     * Get translate
     * @param string $q
     * @return null|RussianWord
     * @throws NotFoundHttpException
     */
    public function actionTranslate($q)
    {
        if (($model = RussianWord::findOne(['name' => $q])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
    }

    /**
     * Get list words
     * @param string $q
     * @return array
     */
    public function actionSearch($q)
    {
        return Yii::createObject(RussianWordManager::class)->getWordsWithFilter($q);
    }
}
