<?php

use app\modules\user\models\User;

$time = time();

$moderator = User::findOne(['username' => 'moderator']);
$admin = User::findOne(['username' => 'admin']);

return [
    'moderator' => [
        'item_name' => 'moderator',
        'user_id' => $moderator->id,
        'created_at' => $time,
    ],
    'admin' => [
        'item_name' => 'admin',
        'user_id' => $admin->id,
        'created_at' => $time,
    ],
];