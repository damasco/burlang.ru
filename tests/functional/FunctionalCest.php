<?php

namespace tests\functional;

use FunctionalTester;
use tests\_pages\LoginPage;
use yii\helpers\Url;
use Yii;

class FunctionalCest
{
    /**
     * @param string $role
     * @return array
     */
    private function getTestUser($role)
    {
        $users = Yii::$app->params['test.users'];
        return $users[$role];
    }

    protected function loginAsAdmin(FunctionalTester $I)
    {
        $user = $this->getTestUser('admin');
        $this->login($I, $user['username'], $user['password']);
    }
    
    protected function loginAsModerator(FunctionalTester $I)
    {
        $user = $this->getTestUser('moderator');
        $this->login($I, $user['username'], $user['password']);
    }
    
    protected function loginAsUser(FunctionalTester $I)
    {
        $user = $this->getTestUser('user');
        $this->login($I, $user['username'], $user['password']);
    }

    protected function login(FunctionalTester $I, $username, $password)
    {
        $loginPage = LoginPage::openBy($I);
        $I->seeInTitle('Sign in');
        $loginPage->login($username, $password);
        $I->see('Logout', '.nav');
    }
    
    protected function logout(FunctionalTester $I)
    {
        $I->see('Logout', '.nav');
        $I->sendAjaxPostRequest(Url::to(['/user/security/logout']));
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Login', '.nav');
    }
}

