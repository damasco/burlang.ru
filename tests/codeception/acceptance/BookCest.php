<?php

namespace test\codeception\acceptance;

use AcceptanceTester;
use Yii;

class BookCest
{
    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that books page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Books');
        $I->click('Books');

        if (method_exists($I, 'wait')) {
            $I->wait(2); // only for selenuim
        }
        $I->see('Books', 'h1');
    }
}