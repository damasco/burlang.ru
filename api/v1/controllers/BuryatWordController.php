<?php

namespace app\api\v1\controllers;

use app\api\v1\components\Controller;
use app\api\v1\models\BuryatWord;
use app\services\BuryatWordService;
use Yii;
use yii\web\NotFoundHttpException;

class BuryatWordController extends Controller
{
    protected function verbs(): array
    {
        return [
            'search' => ['GET'],
            'translate' => ['GET'],
        ];
    }

    public function actionSearch(BuryatWordService $buryatWordService, string $q): array
    {
        return $buryatWordService->find($q);
    }

    public function actionTranslate(string $q): BuryatWord
    {
        $model = BuryatWord::findOne(['name' => $q]);
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
        return $model;
    }
}
