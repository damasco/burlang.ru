<?php

namespace app\controllers;

use app\models\BuryatWord;
use app\models\BuryatName;
use app\models\Ruwords;
use Yii;
use yii\web\Controller;
use yii\helpers\Json;

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
//    public function actionAbout()
//    {
//        return $this->render('about');
//    }

    /**
     * Get list russian words for autocomplete
     * @param string $term
     * @return mixed
     */
    public function actionGetRuwords($term)
    {
        $result = Ruwords::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', $term . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->asArray()
            ->all();
        return Json::encode($result);
    }

    /**
     * Get list buryat words for autocomplete
     * @param string $term
     * @return mixed
     */
    public function actionGetBuryatWord($term)
    {
        $result = BuryatWord::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', $term . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->asArray()
            ->all();
        return Json::encode($result);
    }

    /**
     * Get list buryat names for autocomplete
     * @param string $term
     * @return mixed
     */
    public function actionGetBurnames($term)
    {
        $result = BuryatName::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', $term . '%', false])
            ->orderBy('name')
            ->limit(10)
            ->asArray()
            ->all();
        return Json::encode($result);
    }

    /**
     * Get translate for russian word
     * @param string $ruword
     * @return mixed
     */
    public function actionRu2bur($ruword)
    {
        $word = Ruwords::findOne(['name' => $ruword]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translate', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'ruword' => $word
        ]);
    }

    /**
     * Get translate for buryat word
     * @param string $buryat_word
     * @return mixed
     */
    public function actionBur2ru($buryat_word)
    {
        $word = BuryatWord::findOne(['name' => $buryat_word]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translate', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'buryat_word' => $word
        ]);
    }

    /**
     * Get description for buryat name
     * @param string $burname
     * @return mixed
     */
    public function actionBurname($burname)
    {
        $burname = BuryatName::findOne(['name' => $burname]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_burname', [
                'burname' => $burname
            ]);
        }
        return $this->render('index', [
            'burname' => $burname
        ]);
    }
}
