<?php

namespace tests\functional;

use FunctionalTester;
use Yii;

class DictionaryCest
{
    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page works for admin');
        $I->loginAsAdmin();
        $I->amOnPage(['/dictionary/index']);
        $I->seeInTitle('Dictionaries');
        $I->logout();
    }

    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for moderator');
        $I->loginAsModerator();
        $I->seeInTitle('Forbidden');
        $I->logout();
    }

    // public function indexPageAsUser(FunctionalTester $I)
    // {
    //     $I->wantTo('ensure that dictionary index page not works for simple user');
    //     $I->loginAsUser();
    //     $I->seeInTitle('Forbidden');
    //     $I->logout();
    // }
}