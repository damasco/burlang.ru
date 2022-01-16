<?php

use yii\rbac\Item;

return [
    // permissions
    'book_management' => [
        'type' => Item::TYPE_PERMISSION,
        'description' => 'Управление книгами',
        'ruleName' => null,
        'data' => null,
    ],
    'news_management' => [
        'type' => Item::TYPE_PERMISSION,
        'description' => 'Управление новостями',
        'ruleName' => null,
        'data' => null,
    ],
    // roles
    'moderator' => [
        'type' => Item::TYPE_ROLE,
        'description' => 'Модератор',
        'children' => [
            'book_management',
        ],
        'ruleName' => null,
        'data' => null,
    ],
    'admin' => [
        'type' => Item::TYPE_ROLE,
        'description' => 'Администратор',
        'children' => [
            'moderator',
            'news_management',
        ],
        'ruleName' => null,
        'data' => null,
    ],
];
