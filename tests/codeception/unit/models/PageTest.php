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
            'menu_name' => 'title',
            'title' => 'Title',
            'link' => 'page-name',
            'description' => 'Description',
            'content' => 'Content',
            'active' => 1
        ]);

        expect('model is valid', $model->validate())->true();

        $model->menu_name = '';
        $model->title = '';
        $model->link = '';
        $model->description = '';
        $model->content = '';

        expect('model is not valid', $model->validate())->false();
        expect('menu_name is required', $model->errors)->hasKey('menu_name');
        expect('title is required', $model->errors)->hasKey('title');
        expect('link is required', $model->errors)->hasKey('link');
        expect('description is not required', $model->errors)->hasntKey('description');
        expect('content is required', $model->errors)->hasKey('content');
    }
}
