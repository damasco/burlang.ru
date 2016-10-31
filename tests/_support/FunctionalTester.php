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
        $testUsers = \Yii::$app->params['test.users'];
        $this->amLoggedInAs(User::findOne(['username' => $testUsers['admin']['username']]));
    }

    public function loginAsModerator()
    {
        $testUsers = \Yii::$app->params['test.users'];
        $this->amLoggedInAs(User::findOne(['username' => $testUsers['moderator']['username']]));
    }

    public function loginAsUser()
    {
        $testUsers = \Yii::$app->params['test.users'];
        $this->amLoggedInAs(User::findOne(['username' => $testUsers['user']['username']]));
    }
}
