<?php

namespace app\api\v1\transformer;

use app\models\RussianTranslation;
use app\models\RussianWord;
use League\Fractal\TransformerAbstract;

class RussianWordTranslationsTransformer extends TransformerAbstract
{
    public function transform(RussianWord $word): array
    {
        return [
            'translations' => array_map(
                fn(RussianTranslation $translation) => ['value' => $translation->name],
                $word->translations
            ),
        ];
    }
}
