<?php

namespace tests\codeception\functional;

use FunctionalTester;
use Yii;

class HomeCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that home page works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Buryat-Russian dictionary');
        $I->see('Russian-Buryat dictionary');
    }
}