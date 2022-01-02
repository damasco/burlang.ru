<?php

namespace app\commands;

use dektrium\user\models\User;
use Exception;
use Yii;
use yii\console\Controller;
use yii\helpers\ArrayHelper;

/**
 * Interactive console roles manager
 */
class RolesController extends Controller
{
    /**
     * Adds role to user
     * @throws Exception
     */
    public function actionAssign(): void
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $user = $this->getUser($username);
        $roleName = $this->select('Role:', ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'));
        $authManager = Yii::$app->getAuthManager();
        $role = $authManager->getRole($roleName);
        $authManager->assign($role, $user->id);
        $this->stdout('Done!' . PHP_EOL);
    }

    /**
     * Removes role from user
     * @throws Exception
     */
    public function actionRevoke(): void
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $user = $this->getUser($username);
        $roleName = $this->select(
            'Role:',
            ArrayHelper::merge(
                ['all' => 'All Roles'],
                ArrayHelper::map(Yii::$app->authManager->getRolesByUser($user->id), 'name', 'description')
            )
        );
        $authManager = Yii::$app->getAuthManager();
        if ($roleName === 'all') {
            $authManager->revokeAll($user->id);
        } else {
            $role = $authManager->getRole($roleName);
            $authManager->revoke($role, $user->id);
        }
        $this->stdout('Done!' . PHP_EOL);
    }

    /**
     * @param string $username
     * @return User
     * @throws Exception
     */
    private function getUser(string $username): User
    {
        $user = User::findOne(['username' => $username]);
        if (!$user) {
            throw new Exception('There is no user ' . $username);
        }
        return $user;
    }
}
