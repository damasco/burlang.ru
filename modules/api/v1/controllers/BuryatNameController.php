<?php

namespace app\modules\api\v1\controllers;

use app\models\BuryatName;
use app\modules\api\v1\components\Controller;
use app\modules\api\v1\transformer\BuryatNamesTransformer;
use app\modules\api\v1\transformer\BuryatNameTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use yii\web\NotFoundHttpException;

class BuryatNameController extends Controller
{
    private const SEARCH_LIMIT = 10;

    /**
     * @param string $q
     * @return array
     */
    public function actionSearch(string $q): array
    {
        $names = BuryatName::find()
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(self::SEARCH_LIMIT)
            ->all();
        return (new Manager())
            ->createData(new Collection($names, new BuryatNamesTransformer()))
            ->toArray()['data'];
    }

    /**
     * @param string $q
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionGetName(string $q): array
    {
        $name = $this->getBuryatName($q);
        return (new Manager())
            ->createData(new Item($name, new BuryatNameTransformer()))
            ->toArray()['data'];
    }

    /**
     * {@inheritDoc}
     */
    protected function verbs(): array
    {
        return [
            'search' => ['GET'],
            'get-name' => ['GET'],
        ];
    }

    /**
     * @param string $name
     * @return BuryatName
     * @throws NotFoundHttpException
     */
    private function getBuryatName(string $name): BuryatName
    {
        $name = BuryatName::findOne(['name' => $name]);
        if (!$name) {
            throw new NotFoundHttpException('Слово не найдено');
        }
        return $name;
    }
}
