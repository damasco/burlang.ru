<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\base\InvalidParamException;
use dektrium\user\models\User;

/**
 * Rbac configuration
 */
class RbacController extends Controller
{

    /**
     * Generate default roles and permissions for rbac
     */
    public function actionInit()
    {
        if (!$this->confirm(Yii::t('app', 'Are you sure?'))) {
            return self::EXIT_CODE_NORMAL;
        }
        
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $adminNews = $auth->createPermission('adminNews');
        $adminNews->description = 'Administrate news';
        $auth->add($adminNews);

        $adminBook = $auth->createPermission('adminBook');
        $adminBook->description = 'Administrate book';
        $auth->add($adminBook);

        $moderator = $auth->createRole('moderator');
        $moderator->description = 'Moderator';
        $auth->add($moderator);
        $auth->addChild($moderator, $adminNews);
        $auth->addChild($moderator, $adminBook);

        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);
        $auth->addChild($admin, $moderator);
    }

    /**
     * Assign role for user
     *
     * @param $role
     * @param $username
     * @return int
     */
    public function actionAssign($role, $username)
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
