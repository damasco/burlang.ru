<?php

namespace test\codeception\acceptance;

use Yii;
use AcceptanceTester;

class BuryatNameCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function listPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that buryat-name list page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Buryat names');
        $I->click('Buryat names');

        if (method_exists($I, 'wait')) {
            $I->wait(1); // only for selenuim
        }

        $I->see('Buryat names', 'h1');
    }
}