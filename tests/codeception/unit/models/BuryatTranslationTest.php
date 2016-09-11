<?php

namespace test\codeception\unit;

use app\models\Dictionary;
use Yii;
use app\models\BuryatWord;
use app\models\BuryatTranslation;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class BuryatTranslationTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        BuryatWord::deleteAll(['name' => 'buryat_word']);

        /** @var Dictionary $dictionary */
        $dictionary = Dictionary::find()->one();

        $buryatWord = new BuryatWord([
            'name' => 'buryat_word'
        ]);

        $buryatWord->save();

        $buryatTranslation = new BuryatTranslation([
            'name' => 'buryat_word_translation',
            'burword_id' => $buryatWord->id,
            'dict_id' => $dictionary->id,
        ]);

        expect('model is valid', $buryatTranslation->validate())->true();

        $buryatTranslation->name = '';
        $buryatTranslation->burword_id = '';
        $buryatTranslation->dict_id = '';

        expect('model is not valid', $buryatTranslation->validate())->false();
        expect('name is required', $buryatTranslation->errors)->hasKey('name');
        expect('burword_id is required', $buryatTranslation->errors)->hasKey('burword_id');
        expect('dict_id is not required', $buryatTranslation->errors)->hasntKey('dict_id');

        $buryatWord->delete();
    }
}