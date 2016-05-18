<?php
return [
    'news' => 'news/index',
    'buryat-name' => 'buryat-name/list',

    'page/<action:(create|delete|update|index)>' => 'page/<action>',
    'page/<link:[\w-]+>' => '/page/view',
];