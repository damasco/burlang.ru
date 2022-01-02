<?php

namespace app\api\v1\transformer;

use app\models\BuryatName;
use League\Fractal\TransformerAbstract;

class BuryatNamesTransformer extends TransformerAbstract
{
    public function transform(BuryatName $name): array
    {
        return [
            'value' => $name->name,
        ];
    }
}
