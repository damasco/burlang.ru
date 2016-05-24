<?php

/* @var $scenario Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see('Burlang');
$I->seeLink('Login');
$I->click('Login');
$I->see('Sign in');
