<?php

namespace tests\codeception\functional;

use FunctionalTester;
use Yii;
use yii\helpers\Url;

class NewsCest extends FunctionalCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that news page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('News');
        $I->click('News');

        $I->see('News', 'h1');
    }
    
    /**
     * @before loginAsAdmin
     * @after logout
     */
    public function createPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that news create page works for admin');
        
        $I->amOnPage(Url::to(['/news/create']));
        $I->seeInTitle('Create news');
    }
    
    /**
     * @before loginAsModerator
     * @after logout
     */
    public function createPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that news create page not works for moderator');
        
        $I->amOnPage(Url::to(['/news/create']));
        $I->seeInTitle('Forbidden');
    }
    
    /**
     * @before loginAsUser
     * @after logout
     */
    public function createPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that news create page not works for simple user');
        
        $I->amOnPage(Url::to(['/news/create']));
        $I->seeInTitle('Forbidden');
    }
}