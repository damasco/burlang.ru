<?php

namespace app\api\v1\transformer;

use app\models\RussianWord;
use League\Fractal\TransformerAbstract;

class RussianWordsTransformer extends TransformerAbstract
{
    public function transform(RussianWord $word): array
    {
        return [
            'value' => $word->name,
        ];
    }
}
