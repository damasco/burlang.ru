<?php

namespace tests\codeception\acceptance;

use AcceptanceTester;
use tests\codeception\_pages\DictionaryPage;
use Yii;

class DictionaryCest extends AcceptanceCest
{
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function indexPageAsAdmin(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for admin');

        DictionaryPage::openBy($I);
        $I->seeInTitle('Dictionaries');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function indexPageAsModerator(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary create page works for moderator');

        DictionaryPage::openBy($I);
        $I->seeInTitle('Dictionaries');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function indexPageAsUser(AcceptanceTester $I)
    {
        $I->wantTo('ensure that dictionary index page not works for simple user');

        DictionaryPage::openBy($I);
        $I->seeInTitle('Forbidden');
    }
}