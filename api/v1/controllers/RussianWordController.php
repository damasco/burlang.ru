<?php

namespace app\api\v1\controllers;

use app\api\v1\components\Controller;
use app\api\v1\models\RussianWord;
use app\services\RussianWordService;
use Yii;
use yii\web\NotFoundHttpException;

class RussianWordController extends Controller
{
    protected function verbs(): array
    {
        return [
            'search' => ['GET'],
            'translate' => ['GET'],
        ];
    }

    public function actionSearch(RussianWordService $russianWordService, $q)
    {
        return $russianWordService->find($q);
    }

    public function actionTranslate($q)
    {
        $model = RussianWord::findOne(['name' => $q]);
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
        return $model;
    }
}
