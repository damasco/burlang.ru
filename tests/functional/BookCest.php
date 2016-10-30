<?php

namespace tests\functional;

use FunctionalTester;
use tests\pages\LoginPage;
use Yii;

class BookCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that book page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Books');
        $I->click('Books');

        $I->see('Books', 'h1');
    }

    public function createPageAsAdmin(FunctionalTester $I)
    {
        LoginPage::loginAsAdmin($I);
        $I->wantTo('ensure that book create page works for admin');
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
    }

    public function createPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page works for moderator');
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Create book');
    }

    public function createPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that book create page not works for simple user');
        $I->amOnPage(['book/create']);
        $I->seeInTitle('Forbidden');
    }
}