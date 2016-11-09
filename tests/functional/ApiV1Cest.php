<?php

namespace tests\functional;

use FunctionalTester;

class ApiV1Cest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that api v1 page works');
        $I->amOnPage(['/']);
        $I->seeLink('Api');
        $I->click('Api');
        $I->see('Api v1', 'h1');
    }
}