<?php

namespace tests\codeception\functional;

use FunctionalTester;
use Yii;

class BookCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that book page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Books');
        $I->click('Books');

        $I->see('Books', 'h1');
    }
}