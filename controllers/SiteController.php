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
                    'russian-words-form' => ['GET'],
                    'buryat-words-form' => ['GET'],
                    'find-russian-words' => ['GET'],
                    'find-buryat-words' => ['GET'],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionBuryatWordsForm(): string
    {
        return $this->renderAjax('_buryat_words_form');
    }

    public function actionRussianWordsForm(): string
    {
        return $this->renderAjax('_russian_words_form');
    }

    public function actionFindRussianWords(string $q): string
    {
        $q = trim($q);
        $words = RussianWord::find()
            ->with('translations')
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(self::SEARCH_LIMIT)
            ->all();

        return $this->renderAjax('_words', [
            'q' => $q,
            'words' => $words,
        ]);
    }

    public function actionFindBuryatWords(string $q): string
    {
        $q = trim($q);
        $words = BuryatWord::find()
            ->with('translations')
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(self::SEARCH_LIMIT)
            ->all();

        return $this->renderAjax('_words', [
            'q' => $q,
            'words' => $words,
        ]);
    }
}
