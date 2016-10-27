<?php

namespace test\unit\models;

use app\models\Book;
use app\models\BookChapter;
use Codeception\Specify;
use Codeception\Test\Unit;
use app\modules\user\models\User;

class BookChapterTest extends Unit
{
    use Specify;
    
    protected function setUp() 
    {
        parent::setUp();
        Book::deleteAll([
            'or', 
            ['title' => 'Title'],
            ['title' => 'Test book'],
            ['title' => 'New book']
        ]);
        BookChapter::deleteAll([
            'or', 
            ['title' => 'Test chapter'],
            ['title' => 'Unique chapter']
        ]);
        \Yii::$app->user->login(new User(['id' => 1]));
    }

    public function testRules()
    {
        $book = new Book([
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);

        $book->save();

        $bookChapter = new BookChapter([
            'title' => 'Title',
            'content' => 'Content',
            'book_id' => $book->id,
        ]);

        expect('model is valid', $bookChapter->validate())->true();
        
        $bookChapter->title = '';
        $bookChapter->content = '';
        $bookChapter->book_id = '';

        expect('model is not valid', $bookChapter->validate())->false();
        expect('title is required', $bookChapter->errors)->hasKey('title');
        expect('content is not required', $bookChapter->errors)->hasntKey('content');
        expect('book_id is required', $bookChapter->errors)->hasKey('book_id');
        
        expect('book is deleted', $book->delete())->equals(1);
    }
    
    public function testSave()
    {
        $book = new Book([
            'title' => 'Test book',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);
        
        $book->save();
        
        $bookChapter = new BookChapter([
            'title' => 'Test chapter',
            'content' => 'Content',
            'book_id' => $book->id,
        ]);
        
        expect('chapter is saved', $bookChapter->save())->true();
        expect('slug is not empty', $bookChapter->slug)->notEmpty();
        expect('slug is correct', $bookChapter->slug)->equals('test-chapter');
        expect('created_at is correct', $bookChapter->created_at)->notEmpty();
        expect('updated_at is correct', $bookChapter->updated_at)->notEmpty();
        expect('chapter is deleted', $bookChapter->delete())->equals(1);
        
        expect('book is deleted', $book->delete())->equals(1);
    }
    
    public function testUniqueTitle()
    {
        $book = new Book([
            'title' => 'New book',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);
        
        $book->save();
        
        $bookChapter = new BookChapter([
            'title' => 'Unique chapter',
            'content' => 'Content',
            'book_id' => $book->id,
        ]);
        
        expect('chapter is saved', $bookChapter->save())->true();
        
        $newChapter = new BookChapter([
            'title' => 'Unique chapter',
            'content' => 'Other content',
            'book_id' => $book->id,
        ]);
        
        expect('chapter is not valid', $newChapter->validate())->false();
        
        expect('chapter is deleted', $bookChapter->delete())->equals(1);
        
        expect('book is deleted', $book->delete())->equals(1);
    }
}