<?php

namespace tests\codeception\functional;

use AcceptanceTester;
use Yii;

class ApiV1Cest
{
    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that api v1 page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Api');
        $I->click('Api');

        if (method_exists($I, 'wait')) {
            $I->wait(1); // only for selenuim
        }

        $I->see('Api v1', 'h1');
    }
}