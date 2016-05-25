<?php

/* @var $scenario Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that home page works');

$I->amOnPage(Yii::$app->homeUrl);
$I->seeLink('News');
$I->click('News');

if (method_exists($I, 'wait')) {
    $I->wait(1); // only for selenuim
}
$I->see('News', 'h1');