<?php

use test\codeception\_pages\LoginPage;

/* @var $scenario Codeception\Scenario */

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that login page works');
$loginPage = LoginPage::openBy($I);
$I->see('Sign in');

$I->amGoingTo('try to login with empty credentials');
$loginPage->login('', '');
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo('see validations errors');
$I->see('Login cannot be blank.');
$I->see('Password cannot be blank.');

$I->amGoingTo('try to login with wrong credentials');
$loginPage->login('admin', 'wrong');
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo('see validations errors');
$I->see('Invalid login or password');

$I->amGoingTo('try to login with correct credentials');
// need to add test information user in /config/param-local.php
/*
 * Example
 * ...
 * 'test-user' => ['login' => 'test', 'password' => 'password']
 * ...
 * */
$testUser = Yii::$app->params['test-user'];
$loginPage->login($testUser['login'], $testUser['password']);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo('see user info');
$I->see('admin');
