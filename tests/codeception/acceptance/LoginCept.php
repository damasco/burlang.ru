<?php

use test\codeception\_pages\LoginPage;

/** @var $scenario Codeception\Scenario */

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
