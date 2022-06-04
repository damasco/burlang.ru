<?php

namespace app\controllers;

use app\models\RussianWord;
use app\models\BuryatWord;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    private const SEARCH_LIMIT = 5;

    /**
     * {@inheritDoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                    'russian-to-buryat' => ['GET'],
                    'buryat-to-russian' => ['GET'],
                    'russian-word-translate' => ['GET'],
                    'buryat-word-translate' => ['GET'],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionBuryatToRussian(): string
    {
        return $this->renderAjax('_buryat_form');
    }

    public function actionRussianToBuryat(): string
    {
        return $this->renderAjax('_russian_form');
    }

    public function actionRussianWordTranslate(string $q): string
    {
        $q = trim($q);
        $words = RussianWord::find()
            ->with('translations')
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(self::SEARCH_LIMIT)
            ->all();

        return $this->renderAjax('_translations', [
            'q' => $q,
            'words' => $words,
        ]);
    }

    public function actionBuryatWordTranslate(string $q): string
    {
        $q = trim($q);
        $words = BuryatWord::find()
            ->with('translations')
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(self::SEARCH_LIMIT)
            ->all();

        return $this->renderAjax('_translations', [
            'q' => $q,
            'words' => $words,
        ]);
    }
}
