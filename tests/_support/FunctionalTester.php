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

//    public function logout()
//    {
//        \Yii::$app->user->logout();
//    }
}
