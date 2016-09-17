<?php

namespace test\codeception\unit\models;

use app\models\BuryatWord;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class BuryatWordTest extends DbTestCase
{
    use Specify;

    protected function setUp() {
        parent::setUp();
        BuryatWord::deleteAll([
            'or', 
            ['name' => 'UniqueWord']
        ]);
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
    }
}
