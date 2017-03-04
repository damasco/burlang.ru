<?php

namespace tests\functional;

use FunctionalTester;
use app\tests\fixtures\UserWithRbacFixture;

class BuryatWordCest
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
        $I->amOnPage(['/buryat-word/index']);
        $I->seeInTitle('Buryat words');
    }

    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');
        $I->amLoggedInAsModerator();
        $I->amOnPage(['/buryat-word/index']);
        $I->seeInTitle('Buryat words');
    }

     public function indexPageAsUser(FunctionalTester $I)
     {
         $I->wantTo('ensure that dictionary index page not works for simple user');
         $I->amLoggedInAsUser();
         $I->amOnPage(['/buryat-word/index']);
         $I->seeInTitle('Forbidden');
     }
}