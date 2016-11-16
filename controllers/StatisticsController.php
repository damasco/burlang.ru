<?php

namespace app\controllers;

use app\models\BuryatName;
use app\models\BuryatTranslation;
use app\models\BuryatWord;
use app\models\RussianTranslation;
use app\models\RussianWord;
use app\models\SearchData;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class StatisticsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $buryatWords = [];
        $buryatWords['amount'] = BuryatWord::find()->count();
        $buryatWords['amountTranslations'] = BuryatTranslation::find()->count();

        $russianWords = [];
        $russianWords['amount'] = RussianWord::find()->count();
        $russianWords['amountTranslations'] = RussianTranslation::find()->count();

        $names = [];
        $names['amount'] = BuryatName::find()->count();

        return $this->render('index', [
            'buryatWords' => $buryatWords,
            'russianWords' => $russianWords,
            'names' => $names,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionSearch()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SearchData::find()->orderBy('created_at DESC')
        ]);

        return $this->render('search', [
            'dataProvider' => $dataProvider
        ]);
    }
}
