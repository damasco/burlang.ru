<?php

namespace tests\_pages;

use dektrium\user\models\LoginForm;
use Yii;

class LoginPage
{
    public $route = 'user/security/login';

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