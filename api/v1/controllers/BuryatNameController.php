<?php

namespace app\api\v1\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\Cors;
use app\api\v1\models\BuryatName;

class BuryatNameController extends ActiveController
{
    public $modelClass = 'app\api\v1\models\BuryatName';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::className(),
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $action = parent::actions();
        unset(
            $action['delete'],
            $action['index'],
            $action['view'],
            $action['create'],
            $action['update']
        );

        return $action;
    }

    /**
     * Get list names
     * @param string $q
     * @return array
     */
    public function actionGetNames($q)
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

    public function actionView($name)
    {
        if (($model = BuryatName::findOne(['name' => $name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
    }
}