<?php

namespace app\controllers;

use app\filters\AjaxFilter;
use app\services\BuryatWordManager;
use app\services\RussianWordManager;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

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
                'class' => AjaxFilter::class,
                'only' => [
                    'get-russian-words',
                    'get-buryat-words',
                    'russian-translate',
                    'buryat-translate',
                ]
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
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
        return Yii::createObject(RussianWordManager::class)->getWordsWithFilter($term);
    }

    /**
     * Get list buryat words for autocomplete
     * @param string $term
     * @return string
     */
    public function actionGetBuryatWords($term)
    {
        return Yii::createObject(BuryatWordManager::class)->getWordsWithFilter($term);
    }

    /**
     * Get translate for russian word
     * @param string $russian_word
     * @return mixed
     */
    public function actionRussianTranslate($russian_word)
    {
        $translations = Yii::createObject(RussianWordManager::class)->getTranslations($russian_word);

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
        $translations = Yii::createObject(BuryatWordManager::class)->getTranslations($buryat_word);

        return $this->renderAjax('_translation', [
            'translations' => $translations
        ]);
    }
}
