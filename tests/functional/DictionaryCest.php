<?php

namespace tests\functional;

use FunctionalTester;
use Yii;

class DictionaryCest
{
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page works for admin');
        $I->loginAsAdmin();
        $I->amOnPage(['/dictionary/index']);
        $I->seeInTitle('Dictionaries');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for moderator');
        $I->loginAsModerator();
        $I->seeInTitle('Forbidden');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function indexPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');
        $I->loginAsUser();
        $I->seeInTitle('Forbidden');
    }
}