<?php

namespace app\controllers;

use app\models\Burwords;
use app\models\Ruwords;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionGetRuswords()
    {
        $result = Ruwords::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', Yii::$app->request->get('term') . '%', false])
            ->limit(10)
            ->asArray()
            ->all();
        return json_encode($result);
    }

    public function actionGetBurwords()
    {
        $result = Burwords::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', Yii::$app->request->get('term') . '%', false])
            ->limit(10)
            ->asArray()
            ->all();
        return json_encode($result);
    }

    public function actionRus2bur($rusword)
    {
        $word = Ruwords::findOne(['name' => $rusword]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translate', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'rusword' => $word
        ]);
    }

    public function actionBur2rus($burword)
    {
        $word = Burwords::findOne(['name' => $burword]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translate', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'burword' => $word
        ]);
    }
}
