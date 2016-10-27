<?php

namespace tests\acceptance;

use AcceptanceTester;
use tests\_pages\LoginPage;
use Yii;

class AcceptanceCest
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

    protected function loginAsAdmin(AcceptanceTester $I)
    {
        $user = $this->getTestUser('admin');
        $this->login($I, $user['username'], $user['password']);
    }

    protected function loginAsModerator(AcceptanceTester $I)
    {
        $user = $this->getTestUser('moderator');
        $this->login($I, $user['username'], $user['password']);
    }

    protected function loginAsUser(AcceptanceTester $I)
    {
        $user = $this->getTestUser('user');
        $this->login($I, $user['username'], $user['password']);
    }

    protected function login(AcceptanceTester $I, $username, $password)
    {
        $loginPage = LoginPage::openBy($I);
        $I->seeInTitle('Sign in');
        $loginPage->login($username, $password);
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->see($username, '.nav');
    }

    protected function logout(AcceptanceTester $I)
    {
        $I->click('#dropdown-profile a');
        $I->see('Logout', '.nav');
        $I->click('Logout');
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Login', '.nav');
    }
}

