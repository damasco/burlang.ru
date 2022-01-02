<?php

namespace app\api\v1\controllers;

use app\api\v1\components\Controller;
use app\api\v1\models\BuryatName;
use app\services\BuryatWordService;
use Yii;
use yii\web\NotFoundHttpException;

class BuryatNameController extends Controller
{
    protected function verbs(): array
    {
        return [
            'search' => ['GET'],
            'get-name' => ['GET'],
        ];
    }

    public function actionSearch(BuryatWordService $buryatWordService, $q)
    {
        return $buryatWordService->find($q);
    }

    public function actionGetName($q)
    {
        $model = BuryatName::findOne(['name' => $q]);
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
        return $model;
    }
}
