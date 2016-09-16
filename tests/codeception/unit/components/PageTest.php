<?php

namespace test\codeception\unit\components;

use app\components\Page;
use Codeception\Specify;
use yii\codeception\DbTestCase;

class PageTest extends DbTestCase
{
    use Specify;

    public function testMenuItemNull()
    {
        $page = new Page();
        expect('return null string', $page->menuItem('hello'))->equals('');
    }
}