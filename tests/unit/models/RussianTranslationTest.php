<?php

namespace test\unit\models;

use app\modules\api\v1\models\RussianWord;
use app\models\RussianTranslation;
use Codeception\Specify;
use app\modules\user\models\User;
use Codeception\Test\Unit;

class RussianTranslationTest extends Unit
{
    use Specify;

    protected function setUp()
    {
        parent::setUp();
        \Yii::$app->user->login(new User(['id' => 1]));
    }

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
