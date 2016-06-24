<?php
return [
    'news/<action:(create|update|delete)>' => 'news/<action>',
    'news' => 'news/index',
    'news/<slug>' => 'news/view',

    'buryat-name' => 'buryat-name/index',
    'books' => 'book/index',

    '<link:[\w-]+>' => '/page/view',
];