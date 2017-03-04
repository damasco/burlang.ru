<?php

namespace tests\functional;

use app\tests\fixtures\UserWithRbacFixture;
use FunctionalTester;

class BookCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'user' => UserWithRbacFixture::class,
        ]);
    }

    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that book page works');
        $I->amOnPage(['/']);
        $I->seeLink('Books');
        $I->click('Books');
        $I->see('Books', 'h1');
    }

    public function createPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page works for admin');
        $I->amLoggedInAsAdmin();
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
    }

    public function createPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page works for moderator');
        $I->amLoggedInAsModerator();
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
    }

     public function createPageAsUser(FunctionalTester $I)
     {
         $I->wantTo('ensure that book create page not works for simple user');
         $I->amLoggedInAsUser();
         $I->amOnPage(['book/create']);
         $I->seeInTitle('Forbidden');
     }
}