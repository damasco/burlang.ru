<?php

namespace tests\functional;

use FunctionalTester;

class NewsCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that news page works');
        $I->amOnPage(['/']);
        $I->seeLink('News');
        $I->click('News');
        $I->see('News', 'h1');
    }
    
    public function createPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that news create page works for admin');
        $I->loginAsAdmin();
        $I->amOnPage(['/news/create']);
        $I->seeInTitle('Create news');
        $I->logout();
    }
    
    // public function createPageAsModerator(FunctionalTester $I)
    // {
    //     $I->wantTo('ensure that news create page not works for moderator');
    //     $I->loginAsModerator();
    //     $I->amOnPage(['/news/create']);
    //     $I->seeInTitle('Forbidden');
    //     $I->logout();
    // }
    
    // public function createPageAsUser(FunctionalTester $I)
    // {
    //     $I->wantTo('ensure that news create page not works for simple user');
    //     $I->loginAsUser();
    //     $I->amOnPage(['/news/create']);
    //     $I->seeInTitle('Forbidden');
    //     $I->logout();
    // }
}