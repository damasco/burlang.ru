<?php

namespace test\codeception\unit\components;

use app\components\Page;
use Codeception\Specify;
use yii\codeception\DbTestCase;
use app\models\Page as PageModel;

class PageTest extends DbTestCase
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

        $request = $this->getMock('\yii\web\Request', ['getUrl']);
        $request->expects($this->any())
            ->method('getUrl')
            ->will($this->returnValue('/page/' . $pageName));

        \Yii::$app->set('request', $request);

        expect('return about string', $page->menuItem($pageName))->hasKey('label');
    }
}