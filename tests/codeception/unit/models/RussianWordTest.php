<?php

namespace test\codeception\unit\models;

use app\models\RussianWord;
use Codeception\Specify;
use yii\codeception\DbTestCase;
use app\modules\user\models\User;

class RussianWordTest extends DbTestCase
{
    use Specify;
    
    protected function setUp() {
        parent::setUp();
        RussianWord::deleteAll([
            'or', 
            ['name' => 'UniqueWord']
        ]);
        \Yii::$app->user->login(new User(['id' => 1]));
    }

    public function testRules()
    {
        $model = new RussianWord([
            'name' => 'TestWord',
        ]);

        expect('model is valid', $model->validate())->true();

        $model->name = '';

        expect('model is not valid', $model->validate())->false();
        expect('name is required', $model->errors)->hasKey('name');
    }
    
    public function testUniqueName()
    {
        $model = new RussianWord([
            'name' => 'UniqueWord'
        ]);
        
        expect('model is saved', $model->save())->true();
        
        $word = new RussianWord([
            'name' => 'UniqueWord'
        ]);
        
        expect('word is not valid', $word->validate())->false();
        
        expect('model is deleted', $model->delete())->equals(1);
    }
}
