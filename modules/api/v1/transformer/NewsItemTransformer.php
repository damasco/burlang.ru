<?php

declare(strict_types=1);

namespace app\modules\api\v1\transformer;

use app\models\News;
use League\Fractal\TransformerAbstract;

final class NewsItemTransformer extends TransformerAbstract
{
    public function transform(News $news): array
    {
        return [
            'name' => $news->title,
            'content' => $news->content,
            'created_date' => (new \DateTimeImmutable())
                ->setTimestamp($news->created_at)
                ->format('Y-m-d'),
        ];
    }
}
