<?php

namespace test\codeception\unit\models;

use app\models\Book;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class BookTest extends DbTestCase
{
    use Specify;

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
}
