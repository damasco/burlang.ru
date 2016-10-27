<?php

namespace tests\functional;

use FunctionalTester;
use tests\_pages\RussianWordPage;
use Yii;

class RussianlWordCest extends FunctionalCest
{
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for admin');

        RussianWordPage::openBy($I);
        $I->seeInTitle('Russian words');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');

        RussianWordPage::openBy($I);
        $I->seeInTitle('Russian words');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function indexPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');

        RussianWordPage::openBy($I);
        $I->seeInTitle('Forbidden');
    }
}