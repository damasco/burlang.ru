<?php
return [
//    [
//        'class' => 'yii\rest\UrlRule',
//        'controller' => [
//            'api/v1/buryat-word',
//            'api/v1/russian-word'
//        ],
//    ],

    'news/<action:(create|update|delete)>' => 'news/<action>',
    'news' => 'news/index',
    'news/<slug>' => 'news/view',

    'book/<action:(create|update|delete|chapter-create|chapter-update|chapter-delete)>' => 'book/<action>',
    'books' => 'book/index',
    'book/<slug>' => 'book/view',
    'book/<slug>/<slug_chapter>' => 'book/chapter',

    'names' => 'buryat-name/index',
    'names/<name>' => 'buryat-name/view-name',

    'page/<action:(create|update|delete|index)>' => 'page/<action>',
    'page/<link:[\w-]+>' => 'page/view',
];