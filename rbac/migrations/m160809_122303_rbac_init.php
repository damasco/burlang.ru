<?php

use yii\db\Migration;

class m160809_122303_rbac_init extends Migration
{
    public function up()
    {
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
        $auth->addChild($moderator, $adminBook);

        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);
        $auth->addChild($admin, $adminNews);
        $auth->addChild($admin, $moderator);
    }

    public function down()
    {
        Yii::$app->authManager->removeAll();
    }
}
