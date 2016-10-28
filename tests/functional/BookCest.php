<?php

namespace tests\functional;

use FunctionalTester;
use Yii;

class BookCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->amLoggedInAs();
        $I->wantTo('ensure that book page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Books');
        $I->click('Books');

        $I->see('Books', 'h1');
    }

    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function createPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page works for admin');
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function createPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page works for moderator');
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function createPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page not works for simple user');
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Forbidden');
    }
}