<?php

namespace app\controllers;

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\SearchData;
use app\services\BuryatWordService;
use app\services\RussianWordService;
use app\services\SearchDataService;
use yii\filters\AccessControl;
use yii\filters\AjaxFilter;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'error' => ['GET'],
                    'index' => ['GET'],
                    'find-russian-words' => ['GET'],
                    'find-buryat-words' => ['GET'],
                    'russian-translate' => ['GET'],
                    'buryat-translate' => ['GET'],
                ],
            ],
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
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'error',
                            'index',
                            'find-russian-words',
                            'find-buryat-words',
                            'russian-translate',
                            'buryat-translate',
                        ],
                        'roles' => ['?', '@'],
                    ]
                ],
            ],
        ];
    }

    public function actionIndex(DeviceDetectInterface $deviceDetect): string
    {
        return $this->render('index', ['deviceDetect' => $deviceDetect]);
    }

    public function actionFindRussianWords(
        RussianWordService $russianWordService,
        string $term
    ): array {
        return $russianWordService->find($term);
    }

    public function actionFindBuryatWords(
        BuryatWordService $buryatWordService,
        string $term
    ): array {
        return $buryatWordService->find($term);
    }

    public function actionRussianTranslate(
        RussianWordService $russianWordService,
        SearchDataService  $searchDataService,
        string $q
    ): string {
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
        string $q
    ): string {
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
