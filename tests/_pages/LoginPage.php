<?php

namespace tests\_pages;

use Codeception\Actor;
use Yii;

class LoginPage
{
    public static $url = ['user/security/login'];

    /**
     * @param \FunctionalTester|\AcceptanceTester $I
     * @throws \yii\base\InvalidConfigException
     */
    public static function loginAsAdmin($I)
    {
        $testUsers = Yii::$app->params['test.users'];
        $admin = $testUsers['admin'];
        self::login($I, $admin['username'], $admin['password']);
    }

    /**
     * @param \FunctionalTester|\AcceptanceTester $I
     * @throws \yii\base\InvalidConfigException
     */
    public static function loginAsModerator($I)
    {
        $testUsers = Yii::$app->params['test.users'];
        $admin = $testUsers['moderator'];
        self::login($I, $admin['username'], $admin['password']);
    }

    /**
     * @param \FunctionalTester|\AcceptanceTester $I
     * @throws \yii\base\InvalidConfigException
     */
    public static function loginAsUser($I)
    {
        $testUsers = Yii::$app->params['test.users'];
        $admin = $testUsers['user'];
        self::login($I, $admin['username'], $admin['password']);
    }

    /**
     * @param \FunctionalTester|\AcceptanceTester $I
     * @param string $username
     * @param string $password
     */
    protected function login($I, $username, $password)
    {
        $I->amOnPage(self::$url);
        $I->fillField('input[name="login-form[login]"]', $username);
        $I->fillField('input[name="login-form[password]"]', $password);
        $I->click('Sign in');
    }

}