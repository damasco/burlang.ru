<?php

namespace app\controllers;

use app\models\BuryatName;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BuryatNameController extends Controller
{
    public function behaviors(): array
    {
        return [
            [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'letter',
                            'view',
                        ],
                        'verbs' => ['GET'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        $letters = ArrayHelper::map(
            BuryatName::find()
                ->select(['letter' => 'LEFT(name, 1)', 'amount' => 'COUNT(id)'])
                ->groupBy('letter')
                ->orderBy('letter')
                ->asArray()
                ->all(),
            'letter',
            'amount'
        );

        return $this->render('index', [
            'letters' => $letters,
            'names' => BuryatName::find()
                ->select('name')
                ->column(),
        ]);
    }

    public function actionLetter(string $letter): string
    {
        $letter = trim($letter);
        $names = BuryatName::find()
            ->where(['LEFT(name, 1)' => $letter])
            ->all();

        return $this->render('letter', [
            'letter' => $letter,
            'names' => $names,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(string $name): string
    {
        $model = BuryatName::findOne(['name' => $name]);
        if (!$model) {
            throw new NotFoundHttpException('Имя не найдено');
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
