<?php

namespace test\codeception\unit\models;

use app\models\News;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class NewsTest extends DbTestCase
{
    use Specify;

    protected function setUp()
    {
        parent::setUp();
        News::deleteAll([
            'or',
            ['title' => 'Title'],
            ['title' => 'Unique title news'],
            ['title' => 'Test news']
        ]);
    }

    public function testRules()
    {
        $model = new News([
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);

        expect('model is valid', $model->validate())->true();

        $model->title = '';
        $model->description = '';
        $model->content = '';
        $model->active = '';

        expect('model is not valid', $model->validate())->false();
        expect('title is required', $model->errors)->hasKey('title');
        expect('description is not required', $model->errors)->hasntKey('description');
        expect('content is required', $model->errors)->hasKey('content');
        expect('active is required', $model->errors)->hasKey('active');
    }

    public function testUniqueTitle()
    {
        $model = new News([
            'title' => 'Unique title news',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);
        
        expect('model is saved', $model->save())->true();

        $news = new News([
            'title' => 'Unique title news',
            'description' => 'Other description',
            'content' => 'Other content',
            'active' => 0,
        ]);

        expect('news is not valid', $news->validate())->false();
        
        expect('model is deleted', $model->delete())->equals(1);
    }

    public function testSave()
    {
        $model = new News([
            'title' => 'Test news',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);

        expect('model is saved', $model->save())->true();
        expect('slug is not empty', $model->slug)->notEmpty();
        expect('slug is correct', $model->slug)->equals('test-news');
        expect('created_at is correct', $model->created_at)->notEmpty();
        expect('updated_at is correct', $model->updated_at)->notEmpty();
        expect('model is deleted', $model->delete())->equals(1);
    }
}
