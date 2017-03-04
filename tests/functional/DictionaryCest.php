<?php

namespace tests\functional;

use FunctionalTester;
use app\tests\fixtures\UserWithRbacFixture;

class DictionaryCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'user' => UserWithRbacFixture::class,
        ]);
    }

    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page works for admin');
        $I->amLoggedInAsAdmin();
        $I->amOnPage(['/dictionary/index']);
        $I->seeInTitle('Dictionaries');
    }

     public function indexPageAsModerator(FunctionalTester $I)
     {
         $I->wantTo('ensure that dictionary index page not works for moderator');
         $I->amLoggedInAsModerator();
         $I->amOnPage(['/dictionary/index']);
         $I->seeInTitle('Forbidden');
     }

     public function indexPageAsUser(FunctionalTester $I)
     {
         $I->wantTo('ensure that dictionary index page not works for simple user');
         $I->amLoggedInAsUser();
         $I->amOnPage(['/dictionary/index']);
         $I->seeInTitle('Forbidden');
     }
}