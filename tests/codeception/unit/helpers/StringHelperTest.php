<?php

namespace test\codeception\unit\helpers;

use yii\codeception\TestCase;
use app\helpers\StringHelper;

class StringHelperTest extends TestCase
{
    public function testIsWord()
    {
        $string = 'Hello';
        expect('String is word', StringHelper::isWord($string))->true();

        $string = ' Hello . ';
        expect('String is word', StringHelper::isWord($string))->true();
    }

    public function testIsNotWord()
    {
        $string = 'Hello, World!';
        expect('String is not the word', StringHelper::isWord($string))->false();

        $string = '1 year';
        expect('String is not the word', StringHelper::isWord($string))->false();
    }
}