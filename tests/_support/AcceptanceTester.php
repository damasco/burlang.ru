<?php

use app\modules\user\models\User;
use yii\helpers\Url;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public function amLoggedInAsAdmin()
    {
        $this->amLoggedInAs(User::findOne(['username' => 'testAdmin']));
    }

    public function amLoggedInAsModerator()
    {
        $this->amLoggedInAs(User::findOne(['username' => 'testModerator']));
    }

    public function amLoggedInAsUser()
    {
        $this->amLoggedInAs(User::findOne(['username' => 'testUser']));
    }

    protected function amLoggedInAs(User $user)
    {
        $this->amOnPage(Url::to(['/user/security/login']));
        $this->fillField('input[name="login-form[login]"]', $user->username);
        $this->fillField('input[name="login-form[password]"]', 'password_0');
        $this->click('Sign in');
    }

//    public function logout()
//    {
//        $this->click('#dropdown-profile a');
//        $this->see('Logout', '.nav');
//        $this->click('Logout');
//        if (method_exists($this, 'wait')) {
//            $this->wait(2);
//        }
//        $this->amOnPage(Yii::$app->homeUrl);
//        $this->see('Login', '.nav');
//    }
}
