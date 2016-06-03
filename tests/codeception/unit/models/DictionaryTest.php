<?php

namespace test\codeception\unit;

use app\models\Dictionary;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class DictionaryTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        $model = new Dictionary([
            'name' => 'Given name',
            'info' => 'Information',
            'isbn' => 'Code',
        ]);

        expect('model is valid', $model->validate())->true();

        $model->name = '';
        $model->info = '';
        $model->isbn = '';

        expect('model is not valid', $model->validate())->false();
        expect('name is required', $model->errors)->hasKey('name');
        expect('info is required', $model->errors)->hasKey('info');
        expect('isbn is not required', $model->errors)->hasntKey('isbn');
    }

}