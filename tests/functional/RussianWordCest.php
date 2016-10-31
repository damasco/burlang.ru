<?php

namespace tests\functional;

use FunctionalTester;
use Yii;

class RussianlWordCest
{
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for admin');
        $I->loginAsAdmin();
        $I->amOnPage(['/russian-word/index']);
        $I->seeInTitle('Russian words');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');
        $I->loginAsModerator();
        $I->amOnPage(['/russian-word/index']);
        $I->seeInTitle('Russian words');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function indexPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');
        $I->loginAsUser();
        $I->amOnPage(['/russian-word/index']);
        $I->seeInTitle('Forbidden');
    }
}