<?php

use app\models\News;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class NewsTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        $model = new News([
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
        ]);

        expect('model is valid', $model->validate())->true();

        $model->title = '';
        $model->description = '';
        $model->content = '';

        expect('model is not valid', $model->validate())->false();
        expect('title is required', $model->errors)->hasKey('title');
        expect('content is not required', $model->errors)->hasntKey('description');
        expect('content is required', $model->errors)->hasKey('content');

    }

}