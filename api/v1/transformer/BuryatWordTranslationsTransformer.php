<?php

namespace app\api\v1\transformer;

use app\models\BuryatTranslation;
use app\models\BuryatWord;
use League\Fractal\TransformerAbstract;

class BuryatWordTranslationsTransformer extends TransformerAbstract
{
    public function transform(BuryatWord $word): array
    {
        return [
            'translations' => array_map(
                fn (BuryatTranslation $translation) => ['value' => $translation->name],
                $word->translations
            ),
        ];
    }
}
