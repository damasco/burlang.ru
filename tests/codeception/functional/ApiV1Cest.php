<?php

namespace tests\codeception\functional;

use FunctionalTester;
use Yii;

class ApiV1Cest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that api v1 page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Api');
        $I->click('Api');

        $I->see('Api v1', 'h1');
    }
}