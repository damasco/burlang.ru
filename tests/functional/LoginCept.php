<?php

use tests\_pages\LoginPage;

/** @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);

$I->wantTo('ensure that login page works');
$loginPage = LoginPage::openBy($I);
$I->see('Sign in');

$I->amGoingTo('try to login with empty credentials');
$loginPage->login('', '');
$I->expectTo('see validations errors');
$I->see('Login cannot be blank.');
$I->see('Password cannot be blank.');

$I->amGoingTo('try to login with wrong credentials');
$loginPage->login('admin', 'wrong');
$I->expectTo('see validations errors');
$I->see('Invalid login or password');
