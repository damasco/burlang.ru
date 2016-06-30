<?php
return [
    'news/<action:(create|update|delete)>' => 'news/<action>',
    'news' => 'news/index',
    'news/<slug>' => 'news/view',

    'book/<action:(create|update|delete|chapter-create|chapter-update|chapter-delete)>' => 'book/<action>',
    'books' => 'book/index',
    'book/<slug>' => 'book/view',
    'book/<slug>/<slug_chapter>' => 'book/chapter',

    'buryat-name' => 'buryat-name/index',

    '<link:[\w-]+>' => '/page/view',
];