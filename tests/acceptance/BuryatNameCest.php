<?php

namespace tests\acceptance;

use Yii;
use AcceptanceTester;

class BuryatNameCest
{
    public function listPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that buryat-name list page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Names');
        $I->click('Names');

        if (method_exists($I, 'wait')) {
            $I->wait(2); // only for selenuim
        }

        $I->see('Names', 'h1');
    }
}