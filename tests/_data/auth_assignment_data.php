<?php

use app\modules\user\models\User;

$time = time();

$moderator = User::findOne(['username' => 'testModerator']);
$admin = User::findOne(['username' => 'testAdmin']);

return [
    [
        'item_name' => 'moderator',
        'user_id' => $moderator->id,
        'created_at' => $time,
    ],
    [
        'item_name' => 'admin',
        'user_id' => $admin->id,
        'created_at' => $time,
    ],
];