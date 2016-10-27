<?php

namespace tests\functional;

use FunctionalTester;
use tests\_pages\DictionaryPage;
use Yii;

class DictionaryCest extends FunctionalCest
{
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function indexPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page works for admin');

        DictionaryPage::openBy($I);
        $I->seeInTitle('Dictionaries');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function indexPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for moderator');

        DictionaryPage::openBy($I);
        $I->seeInTitle('Forbidden');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function indexPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');

        DictionaryPage::openBy($I);
        $I->seeInTitle('Forbidden');
    }
}