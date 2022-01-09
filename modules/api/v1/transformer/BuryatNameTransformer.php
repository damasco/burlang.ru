<?php

namespace app\modules\api\v1\transformer;

use app\models\BuryatName;
use League\Fractal\TransformerAbstract;

class BuryatNameTransformer extends TransformerAbstract
{
    public function transform(BuryatName $name): array
    {
        return [
            'name' => $name->name,
            'description' => $name->description,
            'note' => $name->note,
            'male' => $name->male,
            'female' => $name->female,
        ];
    }
}
