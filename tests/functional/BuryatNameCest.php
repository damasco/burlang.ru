<?php

namespace tests\functional;

use FunctionalTester;
use Yii;

class BuryatNameCest
{
    public function listPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that buryat-name list page works');

        $I->amOnPage(['/names']);
        $I->seeLink('Names');
        $I->click('Names');

        $I->see('Names', 'h1');
    }
}