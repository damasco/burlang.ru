<?php

namespace tests\acceptance;

use AcceptanceTester;
use Yii;
use tests\_pages\BookCreatePage;

class BookCest extends AcceptanceCest
{
    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that books page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('Books');
        $I->click('Books');

        if (method_exists($I, 'wait')) {
            $I->wait(2); // only for selenuim
        }
        $I->see('Books', 'h1');
    }

    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function createPageAsAdmin(AcceptanceTester $I)
    {
        $I->wantTo('ensure that book create page works for admin');

        BookCreatePage::openBy($I);
        $I->seeInTitle('Create book');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function createPageAsModerator(AcceptanceTester $I)
    {
        $I->wantTo('ensure that book create page works for moderator');

        BookCreatePage::openBy($I);
        $I->seeInTitle('Create book');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function createPageAsUser(AcceptanceTester $I)
    {
        $I->wantTo('ensure that book create page not works for simple user');

        BookCreatePage::openBy($I);
        $I->seeInTitle('Forbidden');
    }
}