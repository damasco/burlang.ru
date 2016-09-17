<?php

namespace test\codeception\unit\models;

use app\models\Book;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class BookTest extends DbTestCase
{
    use Specify;
    
    protected function setUp() {
        parent::setUp();
        Book::deleteAll([
            'or', 
            ['title' => 'Unique title'],
            ['title' => 'Test book'],
        ]);
    }

    public function testRules()
    {
        $model = new Book([
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
        expect('content is not required', $model->errors)->hasntKey('content');
        expect('active is required', $model->errors)->hasKey('active');

    }
    
    public function testUniqueTitle()
    {
        $model = new Book([
            'title' => 'Unique title',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);
        
        expect('model is saved', $model->save())->true();
        
        $book = new Book([
            'title' => 'Unique title',
            'description' => 'Other description',
            'content' => 'Other content',
            'active' => 0,
        ]);
        
        expect('book is not valid', $book->validate())->false();
    }
    
    public function testSave()
    {
        $model = new Book([
            'title' => 'Test book',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);
        
        expect('model is saved', $model->save())->true();
        expect('slug is not empty', $model->slug)->notEmpty();
        expect('slug is correct', $model->slug)->equals('test-book');
        expect('creatad_at is correct', $model->created_at)->notEmpty();
        expect('updated_at is correct', $model->updated_at)->notEmpty();
    }
}
