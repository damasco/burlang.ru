<?php

namespace test\unit\components;

use app\components\PageMenu;
use Codeception\Test\Unit;

class PageTest extends Unit
{
    public function testMenuItemNull()
    {
        self::assertEquals(PageMenu::getUrl('hello'), '');
    }
}