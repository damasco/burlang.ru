<?php

namespace app\controllers;

use app\components\SearchDataCreator;
use app\models\SearchData;
use Yii;
use app\filters\AjaxFilter;
use app\models\BuryatWord;
use app\models\RussianWord;
use yii\web\Controller;
use app\helpers\StringHelper;
use yii\web\Response;
use app\components\BuryatWordManager;
use app\components\RussianWordManager;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => AjaxFilter::className(),
                'only' => [
                    'get-russian-words',
                    'get-buryat-words'
                ]
            ]
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
     * @return string
     */
    public function actionGetRussianWords($term)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return (new RussianWordManager())->getWordWithFilter($term);
    }

    /**
     * Get list buryat words for autocomplete
     * @param string $term
     * @return string
     */
    public function actionGetBuryatWords($term)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return (new BuryatWordManager())->getWordWithFilter($term);
    }

    /**
     * Get translate for russian word
     * @param string $russian_word
     * @return mixed
     */
    public function actionRussianTranslate($russian_word)
    {
        if (!StringHelper::isWord($russian_word)) {
            return $this->onlyWord('russian_word');
        }

        $word = RussianWord::findOne(['name' => $russian_word]);

        if (!$word) {
            (new SearchDataCreator($russian_word, SearchData::RUSSIAN_WORD_TYPE))->execute();
        }

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
        if (!StringHelper::isWord($buryat_word)) {
            return $this->onlyWord('buryat_word');
        }

        $word = BuryatWord::findOne(['name' => $buryat_word]);

        if (!$word) {
            (new SearchDataCreator($buryat_word, SearchData::BURYAT_WORD_TYPE))->execute();
        }

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
     * Return alert
     * @param string $param
     * @return mixed
     */
    protected function onlyWord($param)
    {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_only_word');
        }
        return $this->render('index', [
            $param => false
        ]);
    }
}
