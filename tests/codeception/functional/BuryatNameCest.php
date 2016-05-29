<?php

namespace tests\codeception\functional;

use FunctionalTester;
use Yii;

class BuryatNameCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function listPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that buryat-name list page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Buryat names');
        $I->click('Buryat names');

        $I->see('Buryat names', 'h1');
    }
}