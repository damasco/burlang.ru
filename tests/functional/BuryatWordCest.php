<?php

namespace tests\functional;

use FunctionalTester;
use Yii;

class BuryatWordCest
{
    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for admin');
        $I->loginAsAdmin();
        $I->amOnPage(['/buryat-word/index']);
        $I->seeInTitle('Buryat words');
        $I->logout();
    }

    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');
        $I->loginAsModerator();
        $I->amOnPage(['/buryat-word/index']);
        $I->seeInTitle('Buryat words');
        $I->logout();
    }

    public function indexPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');
        $I->loginAsUser();
        $I->amOnPage(['/buryat-word/index']);
        $I->seeInTitle('Forbidden');
        $I->logout();
    }
}