<?php

namespace test\codeception\unit;

use app\models\RussianWord;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class RussianWordTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        $model = new RussianWord([
            'name' => 'Given name',
        ]);

        expect('model is valid', $model->validate())->true();

        $model->name = '';

        expect('model is not valid', $model->validate())->false();
        expect('name is required', $model->errors)->hasKey('name');
    }
}
