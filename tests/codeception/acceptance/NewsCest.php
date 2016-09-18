<?php

namespace test\codeception\acceptance;

use AcceptanceTester;
use Yii;

class NewsCest
{
    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that news page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('News');
        $I->click('News');

        if (method_exists($I, 'wait')) {
            $I->wait(2); // only for selenuim
        }
        $I->see('News', 'h1');
    }
}