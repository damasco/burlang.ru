<?php

namespace tests\functional;

use FunctionalTester;
use app\tests\fixtures\UserWithRbacFixture;

class RussianlWordCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'user' => UserWithRbacFixture::class,
        ]);
    }

    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for admin');
        $I->amLoggedInAsAdmin();
        $I->amOnPage(['/russian-word/index']);
        $I->seeInTitle('Russian words');
    }

    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');
        $I->amLoggedInAsModerator();
        $I->amOnPage(['/russian-word/index']);
        $I->seeInTitle('Russian words');
    }

     public function indexPageAsUser(FunctionalTester $I)
     {
         $I->wantTo('ensure that dictionary index page not works for simple user');
         $I->amLoggedInAsUser();
         $I->amOnPage(['/russian-word/index']);
         $I->seeInTitle('Forbidden');
     }
}