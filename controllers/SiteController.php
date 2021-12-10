<?php

namespace app\controllers;

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\SearchData;
use app\services\BuryatWordService;
use app\services\RussianWordService;
use app\services\SearchDataService;
use yii\filters\AjaxFilter;
use yii\filters\ContentNegotiator;
use yii\helpers\StringHelper;
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
                    'find-russian-words',
                    'find-buryat-words',
                    'russian-translate',
                    'buryat-translate',
                ]
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'only' => ['find-russian-words', 'find-buryat-words'],
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
    public function actionIndex(DeviceDetectInterface $deviceDetect)
    {
        return $this->render('index', ['deviceDetect' => $deviceDetect]);
    }

    public function actionFindRussianWords(
        RussianWordService $russianWordService,
        string $term
    )
    {
        return $russianWordService->find($term);
    }

    public function actionFindBuryatWords(
        BuryatWordService $buryatWordService,
        string            $term
    )
    {
        return $buryatWordService->find($term);
    }

    public function actionRussianTranslate(
        RussianWordService $russianWordService,
        SearchDataService  $searchDataService,
        string             $q
    )
    {
        if (StringHelper::countWords($q) > 1) {
            return $this->renderAjax('_error_translate');
        }
        $translations = $russianWordService->findTranslations($q);
        if (!$translations) {
            $searchDataService->add($q, SearchData::TYPE_RUSSIAN);
        }
        return $this->renderAjax('_translation', [
            'translations' => $translations
        ]);
    }

    public function actionBuryatTranslate(
        BuryatWordService $buryatWordService,
        SearchDataService $searchDataService,
        string            $q
    )
    {
        if (StringHelper::countWords($q) > 1) {
            return $this->renderAjax('_error_translate');
        }
        $translations = $buryatWordService->findTranslations($q);
        if (!$translations) {
            $searchDataService->add($q, SearchData::TYPE_BURYAT);
        }
        return $this->renderAjax('_translation', [
            'translations' => $translations
        ]);
    }
}
