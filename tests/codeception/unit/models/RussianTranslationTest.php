<?php

namespace test\codeception\unit\models;

use app\api\v1\models\RussianWord;
use app\models\RussianTranslation;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class RussianTranslationTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        RussianWord::deleteAll(['name' => 'russian_word']);

        $russianWord = new RussianWord([
            'name' => 'russian_word'
        ]);

        $russianWord->save();

        $russainTranslation = new RussianTranslation([
            'name' => 'russian_word_translation',
            'ruword_id' => $russianWord->id,
        ]);

        expect('model is valid', $russainTranslation->validate())->true();

        $russainTranslation->name = '';
        $russainTranslation->ruword_id = '';

        expect('model is not valid', $russainTranslation->validate())->false();
        expect('name is required', $russainTranslation->errors)->hasKey('name');
        expect('ruword_id is required', $russainTranslation->errors)->hasKey('ruword_id');

        $russianWord->delete();
    }
}