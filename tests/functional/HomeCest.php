<?php

namespace tests\functional;

use FunctionalTester;

class HomeCest
{
    /** 
     * @Given I am logged as admin
     */
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that home page works');
        $I->amOnPage(['/']);
        $I->see('Buryat-Russian dictionary');
        $I->see('Russian-Buryat dictionary');
    }
}