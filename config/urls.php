<?php
return [
    'news/<action:(create|update|delete)>' => 'news/<action>',
    'news' => 'news/index',
    'news/<slug>' => 'news/view',

    'book/<action:(create|update|delete|chapter-create|chapter-update|chapter|chapter-delete)>' => 'book/<action>',
    'books' => 'book/index',
    'book/<slug>' => 'book/view',

    'buryat-name' => 'buryat-name/index',

    '<link:[\w-]+>' => '/page/view',
];