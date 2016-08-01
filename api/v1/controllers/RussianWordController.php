<?php

namespace app\api\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\Cors;
use yii\web\NotFoundHttpException;
use app\api\v1\models\RussianWord;

class RussianWordController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\api\v1\models\RussianWord';

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
     * @param $word
     * @return null|RussianWord
     * @throws NotFoundHttpException
     */
    public function actionIndex($word)
    {
        if (($model = RussianWord::findOne(['name' => $word])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
    }
}