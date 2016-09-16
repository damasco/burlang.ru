<?php

namespace test\codeception\unit;

use app\models\BuryatWord;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class BuryatWordTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        $model = new BuryatWord([
            'name' => 'Given name',
        ]);

        expect('model is valid', $model->validate())->true();

        $model->name = '';

        expect('model is not valid', $model->validate())->false();
        expect('name is required', $model->errors)->hasKey('name');
    }
}
