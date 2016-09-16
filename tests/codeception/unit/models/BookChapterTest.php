<?php

namespace test\codeception\unit\models;

use Yii;
use app\models\Book;
use app\models\BookChapter;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class BookChapterTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        Book::deleteAll(['title' => 'Title']);

        $book = new Book([
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1,
        ]);

        $book->save();

        $bookChapter = new BookChapter([
            'title' => 'Title',
            'slug' => 'title',
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

        $book->delete();
    }
}