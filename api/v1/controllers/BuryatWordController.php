<?php

namespace app\api\v1\controllers;

use app\api\v1\components\Controller;
use app\api\v1\transformer\BuryatWordsTransformer;
use app\api\v1\transformer\BuryatWordTranslationsTransformer;
use app\models\BuryatWord;
use app\models\SearchData;
use app\services\SearchDataService;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Yii;
use yii\web\NotFoundHttpException;

class BuryatWordController extends Controller
{
    private const SEARCH_LIMIT = 10;

    public function actionSearch(string $q): array
    {
        $words = BuryatWord::find()
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(self::SEARCH_LIMIT)
            ->all();
        return (new Manager())
            ->createData(new Collection($words, new BuryatWordsTransformer()))
            ->toArray()['data'];
    }

    /**
     * @param SearchDataService $searchDataService
     * @param string $q
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionTranslate(
        SearchDataService $searchDataService,
        string $q
    ): array {
        try {
            $word = $this->getWord($q);
            return (new Manager())
                ->createData(
                    new Item(
                        $word,
                        new BuryatWordTranslationsTransformer()
                    )
                )
                ->toArray()['data'];
        } catch (NotFoundHttpException $exception) {
            $searchDataService->add($q, SearchData::TYPE_BURYAT);
            throw $exception;
        }
    }

    /**
     * {@inheritDoc}
     */
    protected function verbs(): array
    {
        return [
            'search' => ['GET'],
            'translate' => ['GET'],
        ];
    }

    /**
     * @param string $value
     * @return BuryatWord
     * @throws NotFoundHttpException
     */
    private function getWord(string $value): BuryatWord
    {
        $word = BuryatWord::findOne(['name' => $value]);
        if (!$word) {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
        return $word;
    }
}
