<?php

namespace app\api\v1\controllers;

use app\services\BuryatWordManager;
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
    public $modelClass = BuryatWord::class;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::class,
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
        return (new BuryatWordManager())->getWordsWithFilter($q);
    }
}