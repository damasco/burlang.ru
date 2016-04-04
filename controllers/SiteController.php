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

    /**
     * Main page
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * About page
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Get list russian words for autocomplete
     * @return mixed
     */
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

    /**
     * Get list buryat words for autocomplete
     * @return mixed
     */
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

    /**
     * Get translate for russian word
     * @param string $rusword
     * @return mixed
     */
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

    /**
     * Get translate for buryat word
     * @param string $burword
     * @return mixed
     */
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
