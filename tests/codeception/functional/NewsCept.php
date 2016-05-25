<?php

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');

$I->wantTo('ensure that home page works');

$I->amOnPage(Yii::$app->homeUrl);
$I->seeLink('News');
$I->click('News');

$I->see('News', 'h1');