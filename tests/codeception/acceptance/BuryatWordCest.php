<?php

namespace tests\codeception\acceptance;

use AcceptanceTester;
use tests\codeception\_pages\BuryatWordPage;
use Yii;

class BuryatWordCest extends AcceptanceCest
{
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function indexPageAsAdmin(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for admin');

        BuryatWordPage::openBy($I);
        $I->seeInTitle('Buryat words');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function indexPageAsModerator(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');

        BuryatWordPage::openBy($I);
        $I->seeInTitle('Buryat words');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function indexPageAsUser(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');

        BuryatWordPage::openBy($I);
        $I->seeInTitle('Forbidden');
    }
}