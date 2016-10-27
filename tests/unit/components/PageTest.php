<?php

namespace test\unit\components;

use app\components\Page;
use Codeception\Specify;
use Codeception\Test\Unit;
use app\models\Page as PageModel;

class PageTest extends Unit
{
    use Specify;

    public function testMenuItemNull()
    {
        $page = new Page();
        expect('return null string', $page->menuItem('hello'))->equals('');
    }

    public function testMenuItem()
    {
        $pageName = 'about';

        /** @var PageModel $model */
        $model = PageModel::findOne(['link' => $pageName]);
        $model->active = 1;
        $model->save();

        $page = new Page();

        $stub = $this->createMock('\yii\web\Request');
        $stub->method('getUrl')->willReturn('/page/' . $pageName);

        \Yii::$app->set('request', $stub);

        expect('return about string', $page->menuItem($pageName))->hasKey('label');
    }
}