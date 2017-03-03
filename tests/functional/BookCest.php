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
        $I->loginAsAdmin();
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
        $I->logout();
    }

    public function createPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page works for moderator');
        $I->loginAsModerator();
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
        $I->logout();
    }

     public function createPageAsUser(FunctionalTester $I)
     {
         $I->wantTo('ensure that book create page not works for simple user');
         $I->loginAsUser();
         $I->amOnPage(['book/create']);
         $I->seeInTitle('Forbidden');
         $I->logout();
     }
}