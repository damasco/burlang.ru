<?php

namespace tests\acceptance;

use yii\helpers\Url;

class HomeCest
{
    public function indexPage(\AcceptanceTester $I)
    {
        $I->wantTo('ensure that home page works');
        $I->amOnPage(Url::to(['/']));
        $I->see('Buryat-Russian dictionary');
        $I->see('Russian-Buryat dictionary');
    }
}