<?php

namespace test\codeception\unit\models;

use app\models\Page;
use Codeception\Specify;
use yii\codeception\DbTestCase;
use app\modules\user\models\User;

class PageTest extends DbTestCase
{
    use Specify;
    
    protected function setUp() {
        parent::setUp();
        Page::deleteAll([
            'or', 
            ['link' => 'unique-page-name'],
            ['link' => 'page-name']
        ]);
        \Yii::$app->user->login(new User(['id' => 1]));
    }

    public function testRules()
    {
        $model = new Page([
            'menu_name' => 'title',
            'title' => 'Title',
            'link' => 'page-name',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
            'static' => 1
        ]);

        expect('model is valid', $model->validate())->true();

        $model->menu_name = '';
        $model->title = '';
        $model->link = '';
        $model->description = '';
        $model->content = '';
        $model->active = '';
        $model->static = '';

        expect('model is not valid', $model->validate())->false();
        expect('menu_name is required', $model->errors)->hasKey('menu_name');
        expect('title is required', $model->errors)->hasKey('title');
        expect('link is required', $model->errors)->hasKey('link');
        expect('description is not required', $model->errors)->hasntKey('description');
        expect('content is required', $model->errors)->hasKey('content');       
        expect('active is required', $model->errors)->hasKey('active');
        expect('static is not required', $model->errors)->hasntKey('static');
    }
    
    public function testUniqueLink()
    {
        $model = new Page([
            'menu_name' => 'title',
            'title' => 'Title',
            'link' => 'unique-page-name',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1
        ]);    
        
        expect('model is saved', $model->save())->true();
        
        $page = new Page([
            'menu_name' => 'other title',
            'title' => 'Other Title',
            'link' => 'unique-page-name',
            'description' => 'Other description',
            'content' => 'Other content',
            'active' => 0
        ]);
        
        expect('page is not valid', $page->validate())->false();
        
        expect('model is deleted', $model->delete())->equals(1);
    }
    
    public function testValidateLink()
    {
        $model = new Page([
            'menu_name' => 'title',
            'title' => 'Title',
            'link' => 'Wrong link',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1
        ]);     
        
        expect('page is not valid', $model->validate())->false();
        
        $model->link = 'valid-link';
       
        expect('page is valid', $model->validate())->true();
    }


    public function testSave()
    {
        $model = new Page([
            'menu_name' => 'title',
            'title' => 'Title',
            'link' => 'page-name',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
            'static' => 1
        ]);

        expect('model is saved', $model->save())->true();
        expect('created_at is correct', $model->created_at)->notEmpty();
        expect('updated_at is correct', $model->updated_at)->notEmpty();
        expect('model is deleted', $model->delete())->equals(1);
    }
}
