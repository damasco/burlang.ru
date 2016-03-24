<?php
return [
    'components.db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=burlang',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
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
    'authclients' => [],

    'adminEmail' => 'dbulats88@gmail.com',

];
