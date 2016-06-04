<?php

namespace test\codeception\unit;

use app\models\BuryatName;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class BuryatNameTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        $model = new BuryatName([
            'name' => 'Given name',
            'description' => 'Description',
            'note' => 'Note',
            'male' => 1,
            'female' => 0
        ]);

        expect('model is valid', $model->validate())->true();

        $model->name = '';
        $model->description = '';
        $model->note = '';
        $model->male = '';
        $model->female = '';

        expect('model is not valid', $model->validate())->false();

        expect('name is required', $model->errors)->hasKey('name');
        expect('description is not required', $model->errors)->hasntKey('description');
        expect('note is not required', $model->errors)->hasntKey('note');
        expect('male is required', $model->errors)->hasKey('male');
        expect('female is required', $model->errors)->hasKey('female');

    }

}