<?php

namespace app\controllers;

use yii\filters\ContentNegotiator;
use Yii;
use app\filters\AjaxFilter;
use yii\web\Controller;
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
            'ajaxFilter' => [
                'class' => AjaxFilter::className(),
                'except' => ['index']
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'only' => ['get-russian-words', 'get-buryat-words'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
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
        return (new RussianWordManager())->getWordsWithFilter($term);
    }

    /**
     * Get list buryat words for autocomplete
     * @param string $term
     * @return string
     */
    public function actionGetBuryatWords($term)
    {
        return (new BuryatWordManager())->getWordsWithFilter($term);
    }

    /**
     * Get translate for russian word
     * @param string $russian_word
     * @return mixed
     */
    public function actionRussianTranslate($russian_word)
    {
        $translations = (new RussianWordManager())->getTranslations($russian_word);

        return $this->renderAjax('_translation', [
            'translations' => $translations
        ]);
    }

    /**
     * Get translate for buryat word
     * @param string $buryat_word
     * @return mixed
     */
    public function actionBuryatTranslate($buryat_word)
    {
        $translations = (new BuryatWordManager())->getTranslations($buryat_word);

        return $this->renderAjax('_translation', [
            'translations' => $translations
        ]);
    }
}
