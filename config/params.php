<?php
return [
    'components.db' => [
        'class' => \yii\db\Connection::class,
        'dsn' => 'mysql:host=localhost;dbname=burlang',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'enableSchemaCache' => true
    ],
    'components.cache' => \yii\caching\FileCache::class,
    'components.mailer' => [
        'class' => \yii\swiftmailer\Mailer::class,
        'useFileTransport' => false,
    ],
    'components.authClientsCollection' => [
        'class' => \yii\authclient\Collection::class,
        'clients' => [],
    ],
    'components.request.key' => 'l-2C_lNvBwQDe4_LLC5eaUhQmvV9yQRm',

    'adminEmail' => 'dbulats88@gmail.com',
];
