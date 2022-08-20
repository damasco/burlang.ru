<?php

declare(strict_types=1);

namespace app\modules\api\v1\controllers;

use app\models\News;
use app\modules\api\v1\components\Controller;
use app\modules\api\v1\transformer\NewsItemTransformer;
use app\modules\api\v1\transformer\NewsTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use yii\web\NotFoundHttpException;

final class NewsController extends Controller
{
    private const PAGE_LIMIT = 5;

    public function actionIndex(int $page = 1): array
    {
        $news = News::find()
            ->where(['active' => 1])
            ->offset(($page - 1) * self::PAGE_LIMIT)
            ->limit(self::PAGE_LIMIT)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return (new Manager())
            ->createData(new Collection($news, new NewsTransformer()))
            ->toArray()['data'];
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionGetNews(string $q): array
    {
        $news = News::find()
            ->where(['slug' => trim($q)])
            ->andWhere(['active' => 1])
            ->one();

        if ($news === null) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует');
        }

        return (new Manager())
            ->createData(new Item($news, new NewsItemTransformer()))
            ->toArray()['data'];
    }

    /**
     * {@inheritDoc}
     */
    protected function verbs(): array
    {
        return [
            'index' => ['GET'],
            'get-news' => ['GET'],
        ];
    }
}
