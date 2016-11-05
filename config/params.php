<?php
return [
    'components.db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=burlang',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'enableSchemaCache' => true
    ],
    'components.cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'components.mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => false,
    ],
    'components.authClientsCollection' => [
        'class' => '\yii\authclient\Collection',
        'clients' => [],
    ],
    'components.request.key' => 'l-2C_lNvBwQDe4_LLC5eaUhQmvV9yQRm',

    'adminEmail' => 'dbulats88@gmail.com',

    'widget.news.limit' => 3,
];
