<?php

namespace app\api\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\Cors;
use app\api\v1\models\BuryatWord;
use yii\web\NotFoundHttpException;

class BuryatWordController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\api\v1\models\BuryatWord';

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
     * @return null|BuryatWord
     * @throws NotFoundHttpException
     */
    public function actionIndex($word)
    {
        if (($model = BuryatWord::findOne(['name' => $word])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
    }
}