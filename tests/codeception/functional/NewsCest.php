<?php

class NewsCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that news page works');

        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('News');
        $I->click('News');

        $I->see('News', 'h1');
    }
}