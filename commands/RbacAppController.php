<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\base\InvalidParamException;
use dektrium\user\models\User;
use yii\rbac\ManagerInterface;

/**
 * Rbac configuration
 */
class RbacAppController extends Controller
{
    /** @var  ManagerInterface */
    private $_auth_manager;

    /**
     * @return ManagerInterface
     */
    public function getAuth()
    {
        if (!$this->_auth_manager) {
            $this->_auth_manager = Yii::$app->authManager;
        }

        return $this->_auth_manager;
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!$this->confirm(Yii::t('app', 'Are you sure?'))) {
                return self::EXIT_CODE_NORMAL;
            }
            return true;
        }
        return false;
    }

    /**
     * Assign role for user
     *
     * @param $role
     * @param $username
     * @throws InvalidParamException
     * @return int
     */
    public function actionAssign($role, $username)
    {
        $user = $this->getUser($username);

        $this->getAuth()->assign($this->getRole($role), $user->id);
    }

    /**
     * Revoke role for user
     *
     * @param $role
     * @param $username
     * @throws InvalidParamException
     */
    public function actionRevoke($role, $username)
    {
        $user = $this->getUser($username);

        $this->getAuth()->revoke($this->getRole($role), $user->id);
    }

    /**
     * @param string $username
     * @return User
     */
    protected function getUser($username)
    {
        /** @var User $user */
        $user = User::findOne(['username' => $username]);
        if (!$user) {
            throw new InvalidParamException("There is no user \"$username\".");
        }

        return $user;
    }

    /**
     * @param $roleName
     * @return null|\yii\rbac\Role
     */
    protected function getRole($roleName)
    {
        $role = $this->getAuth()->getRole($roleName);
        if (!$role) {
            throw new InvalidParamException("There is no role \"$roleName\".");
        }
        return $role;
    }
}
