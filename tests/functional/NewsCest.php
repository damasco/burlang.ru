<?php

namespace tests\functional;

use FunctionalTester;
use app\tests\fixtures\UserWithRbacFixture;

class NewsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'user' => UserWithRbacFixture::class,
        ]);
    }

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
        $I->amLoggedInAsAdmin();
        $I->amOnPage(['/news/create']);
        $I->seeInTitle('Create news');
    }
    
     public function createPageAsModerator(FunctionalTester $I)
     {
         $I->wantTo('ensure that news create page not works for moderator');
         $I->amLoggedInAsModerator();
         $I->amOnPage(['/news/create']);
         $I->seeInTitle('Forbidden');
     }
    
     public function createPageAsUser(FunctionalTester $I)
     {
         $I->wantTo('ensure that news create page not works for simple user');
         $I->amLoggedInAsUser();
         $I->amOnPage(['/news/create']);
         $I->seeInTitle('Forbidden');
     }
}