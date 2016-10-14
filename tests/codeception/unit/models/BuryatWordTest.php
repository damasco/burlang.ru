<?php

namespace test\codeception\unit\models;

use app\models\BuryatWord;
use Codeception\Specify;
use yii\codeception\DbTestCase;
use app\modules\user\models\User;

class BuryatWordTest extends DbTestCase
{
    use Specify;

    protected function setUp() 
    {
        parent::setUp();
        BuryatWord::deleteAll([
            'or', 
            ['name' => 'UniqueWord']
        ]);
        \Yii::$app->user->login(new User(['id' => 1]));
    }
    
    public function testRules()
    {
        $model = new BuryatWord([
            'name' => 'TestWord',
        ]);

        expect('model is valid', $model->validate())->true();

        $model->name = '';

        expect('model is not valid', $model->validate())->false();
        expect('name is required', $model->errors)->hasKey('name');
    }
    
    public function testUniqueName()
    {
        $model = new BuryatWord([
            'name' => 'UniqueWord'
        ]);
        
        expect('model is saved', $model->save())->true();
        
        $word = new BuryatWord([
            'name' => 'UniqueWord'
        ]);
        
        expect('word is not valid', $word->validate())->false();
        
        expect('model is deleted', $model->delete())->equals(1);
    }
}
