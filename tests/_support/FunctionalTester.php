<?php

use app\modules\user\models\User;

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
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    public function loginAsAdmin()
    {
        $this->amLoggedInAs(User::findOne(['username' => 'admin']));
    }

    public function loginAsModerator()
    {
        $this->amLoggedInAs(User::findOne(['username' => 'moderator']));
    }

    public function loginAsUser()
    {
        $this->amLoggedInAs(User::findOne(['username' => 'user']));
    }

    public function logout()
    {
        \Yii::$app->user->logout();
    }
}
