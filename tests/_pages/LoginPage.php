<?php

namespace tests\_pages;

use Codeception\Actor;
use dektrium\user\models\LoginForm;
use Yii;

class LoginPage
{
    private $actor;

    public $route = 'user/security/login';

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    /**
     * @param string $username
     * @param string $password
     */
    public function login($username, $password)
    {
        $loginForm = Yii::createObject(LoginForm::className());

        $this->actor->fillField('input[name="' . $loginForm->formName() . '[login]"]', $username);
        $this->actor->fillField('input[name="' . $loginForm->formName() . '[password]"]', $password);
        $this->actor->click('Sign in');
    }
}