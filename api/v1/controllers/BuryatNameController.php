<?php

namespace app\api\v1\controllers;

use app\api\v1\components\Controller;
use app\api\v1\models\BuryatName;
use Yii;
use yii\web\NotFoundHttpException;

class BuryatNameController extends Controller
{
    /**
     * Get list names
     * @param string $q
     * @return array
     */
    public function actionSearch($q)
    {
        $names = BuryatName::find()
            ->select(['name as value'])
            ->where(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->asArray()
            ->all();

        return $names;
    }

    /**
     * @param string $q
     * @return BuryatName
     * @throws NotFoundHttpException
     */
    public function actionGetName($q)
    {
        if (($model = BuryatName::findOne(['name' => $q])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
    }
}
