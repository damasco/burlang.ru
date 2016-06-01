<?php

namespace test\codeception\unit;

use app\models\Page;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class PageTest extends DbTestCase
{
    use Specify;

    public function testRules()
    {
        $model = new Page([
            'title' => 'Title',
            'link' => 'page-name',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1
        ]);

        expect('model is valid', $model->validate())->true();

        $model->title = '';
        $model->link = '';
        $model->description = '';
        $model->content = '';

        expect('model is not valid', $model->validate())->false();
        expect('title is required', $model->errors)->hasKey('title');
        expect('link is required', $model->errors)->hasKey('link');
        expect('description is not required', $model->errors)->hasntKey('description');
        expect('content is required', $model->errors)->hasKey('content');

    }

}