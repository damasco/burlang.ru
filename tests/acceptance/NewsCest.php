<?php

namespace tests\acceptance;

use AcceptanceTester;
use yii\helpers\Url;
use Yii;

class NewsCest extends AcceptanceCest
{
    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that news page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('News');
        $I->click('News');

        if (method_exists($I, 'wait')) {
            $I->wait(2); // only for selenuim
        }
        $I->see('News', 'h1');
    }

    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function createPageAsAdmin(AcceptanceTester $I)
    {
        $I->wantTo('ensure that news create page works for admin');

        $I->amOnPage(Url::to(['/news/create']));
        $I->seeInTitle('Create news');
    }

    /**
     * @before loginAsModerator
     * @after logout
     */
    public function createPageAsModerator(AcceptanceTester $I)
    {
        $I->wantTo('ensure that news create page not works for moderator');

        $I->amOnPage(Url::to(['/news/create']));
        $I->seeInTitle('Forbidden');
    }

    /**
     * @before loginAsUser
     * @after logout
     */
    public function createPageAsUser(AcceptanceTester $I)
    {
        $I->wantTo('ensure that news create page not works for simple user');

        $I->amOnPage(Url::to(['/news/create']));
        $I->seeInTitle('Forbidden');
    }
}