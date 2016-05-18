<?php

namespace app\controllers;

use app\models\BuryatWord;
use app\models\BuryatName;
use app\models\RussianWord;
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
     * Get list russian words for autocomplete
     * @param string $term
     * @return mixed
     */
    public function actionGetRussianWords($term)
    {
        $result = RussianWord::find()
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
    public function actionGetBuryatWords($term)
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
    public function actionGetBuryatNames($term)
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
     * @param string $russian_word
     * @return mixed
     */
    public function actionRussianTranslate($russian_word)
    {
        $word = RussianWord::findOne(['name' => $russian_word]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translation', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'russian_word' => $word
        ]);
    }

    /**
     * Get translate for buryat word
     * @param string $buryat_word
     * @return mixed
     */
    public function actionBuryatTranslate($buryat_word)
    {
        $word = BuryatWord::findOne(['name' => $buryat_word]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translation', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'buryat_word' => $word
        ]);
    }

    /**
     * Get description for buryat name
     * @param string $buryat_name
     * @return mixed
     */
    public function actionBuryatName($buryat_name)
    {
        $name = BuryatName::findOne(['name' => $buryat_name]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_buryat_name', [
                'buryat_name' => $name
            ]);
        }
        return $this->render('index', [
            'buryat_name' => $name
        ]);
    }
}
