<?php
return [
    'news/<action:(create|update|delete)>' => 'news/<action>',
    'news' => 'news/index',
    'news/<slug:[\w-]+>' => 'news/view',

    'book/<action:(create|update|delete|chapter-create|chapter-update|chapter-delete)>' => 'book/<action>',
    'books' => 'book/index',
    'book/<slug:[\w-]+>' => 'book/view',
    'book/<slug:[\w-]+>/<chapterSlug:[\w-]+>' => 'book/chapter',

    'names/letter/<letter>' => 'buryat-name/index',
    'names' => 'buryat-name/index',
    'names/<name>' => 'buryat-name/view-name',

    'page/<action:(create|update|delete|index)>' => 'page/<action>',
    'page/<link:[\w-]+>' => 'page/view',

    // for old api
    'v1/names/<action>' => 'api/v1/buryat-name/<action>',
    'v1/buryat-word/<action>' => 'api/v1/buryat-word/<action>',
    'v1/russian-word/<action>' => 'api/v1/russian-word/<action>',
];
