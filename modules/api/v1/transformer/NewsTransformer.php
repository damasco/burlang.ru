<?php

declare(strict_types=1);

namespace app\modules\api\v1\transformer;

use app\models\News;
use League\Fractal\TransformerAbstract;

final class NewsTransformer extends TransformerAbstract
{
    public function transform(News $news): array
    {
        return [
            'title' => $news->title,
            'slug' => $news->slug,
            'description' => $news->description,
            'created_date' => (new \DateTimeImmutable())
                ->setTimestamp($news->created_at)
                ->format('Y-m-d'),
        ];
    }
}
