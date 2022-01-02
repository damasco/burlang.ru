<?php

namespace app\api\v1\controllers;

use app\api\v1\components\Controller;
use app\api\v1\transformer\RussianWordsTransformer;
use app\api\v1\transformer\RussianWordTranslationsTransformer;
use app\models\RussianWord;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Yii;
use yii\web\NotFoundHttpException;

class RussianWordController extends Controller
{
    private const SEARCH_LIMIT = 10;

    public function actionSearch(string $q): array
    {
        $words = RussianWord::find()
            ->filterWhere(['like', 'name', $q . '%', false])
            ->orderBy('name')
            ->limit(self::SEARCH_LIMIT)
            ->all();
        return (new Manager())
            ->createData(new Collection($words, new RussianWordsTransformer()))
            ->toArray()['data'];
    }

    /**
     * @param string $q
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionTranslate(string $q): array
    {
        $word = $this->getWord($q);
        return (new Manager())
            ->createData(new Item($word, new RussianWordTranslationsTransformer()))
            ->toArray()['data'];
    }

    /**
     * @param string $name
     * @return RussianWord
     * @throws NotFoundHttpException
     */
    public function getWord(string $name): RussianWord
    {
        $word = RussianWord::findOne(['name' => $name]);
        if (!$word) {
            throw new NotFoundHttpException(Yii::t('app', 'The word is not found'));
        }
        return $word;
    }

    protected function verbs(): array
    {
        return [
            'search' => ['GET'],
            'translate' => ['GET'],
        ];
    }
}
