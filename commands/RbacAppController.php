<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\base\InvalidParamException;
use dektrium\user\models\User;

/**
 * Rbac configuration
 */
class RbacAppController extends Controller
{
    /**
     * Assign role for user
     *
     * @param $role
     * @param $username
     * @throws InvalidParamException
     * @return int
     */
    public function actionAssignRole($role, $username)
    {
        if (!$this->confirm(Yii::t('app', 'Are you sure?'))) {
            return self::EXIT_CODE_NORMAL;
        }

        /* @var User $user */
        $user = User::findOne(['username' => $username]);
        if (!$user) {
            throw new InvalidParamException("There is no user \"$username\".");
        }

        $auth = Yii::$app->authManager;
        $role = $auth->getRole($role);
        if (!$role) {
            throw new InvalidParamException("There is no role \"$role\".");
        }

        $auth->assign($role, $user->id);
    }
}
