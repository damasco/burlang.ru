<?php

namespace tests\acceptance;

use AcceptanceTester;
use tests\_pages\RussianWordPage;
use Yii;

class RussianlWordCest extends AcceptanceCest
{
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function indexPageAsAdmin(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for admin');

        RussianWordPage::openBy($I);
        $I->seeInTitle('Russian words');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function indexPageAsModerator(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');

        RussianWordPage::openBy($I);
        $I->seeInTitle('Russian words');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function indexPageAsUser(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');

        RussianWordPage::openBy($I);
        $I->seeInTitle('Forbidden');
    }
}