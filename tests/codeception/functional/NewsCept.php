<?php

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);

$I->wantTo('ensure that news page works');

$I->amOnPage(Yii::$app->homeUrl);
$I->seeLink('News');
$I->click('News');

$I->see('News', 'h1');