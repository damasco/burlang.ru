<?php

namespace tests\codeception\functional;

use FunctionalTester;
use tests\codeception\_pages\BookCreatePage;
use Yii;

class BookCest extends FunctionalCest
{
    public function indexPage(FunctionalTester $I)
    {
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

        BookCreatePage::openBy($I);
        $I->seeInTitle('Create book');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function createPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page works for moderator');

        BookCreatePage::openBy($I);
        $I->seeInTitle('Create book');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function createPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page not works for simple user');

        BookCreatePage::openBy($I);
        $I->seeInTitle('Forbidden');
    }
}