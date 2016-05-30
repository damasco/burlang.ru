<?php

namespace tests\codeception\functional;

use FunctionalTester;
use Yii;

class BuryatNameCest
{
    public function listPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that buryat-name list page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Buryat names');
        $I->click('Buryat names');

        $I->see('Buryat names', 'h1');
    }
}