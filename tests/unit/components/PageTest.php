<?php

namespace test\unit\components;

use app\components\Page;
use app\modules\user\models\User;
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

        \Yii::$app->user->login(new User(['id' => 1]));
        /** @var PageModel $model */
        $model = PageModel::findOne(['link' => $pageName]);
        if (!$model->active) {
            $model->active = 1;
            $model->save();
        }

        $page = new Page();

        $stub = $this->createMock('\yii\web\Request');
        $stub->method('getUrl')->willReturn('/page/' . $pageName);

        \Yii::$app->set('request', $stub);

        expect('return about string', $page->menuItem($pageName))->hasKey('label');
    }
}