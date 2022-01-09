<?php

namespace app\modules\api\v1\transformer;

use app\models\BuryatWord;
use League\Fractal\TransformerAbstract;

class BuryatWordsTransformer extends TransformerAbstract
{
    public function transform(BuryatWord $word): array
    {
        return [
            'value' => $word->name,
        ];
    }
}
