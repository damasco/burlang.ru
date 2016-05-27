<?php

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);

$I->wantTo('ensure that buryat-name list page works');

$I->amOnPage(Yii::$app->homeUrl);
$I->seeLink('Buryat names');
$I->click('Buryat names');

$I->see('Buryat names', 'h1');