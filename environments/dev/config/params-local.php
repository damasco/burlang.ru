<?php
return [
//    'components.db' => [
//        'class' => 'yii\db\Connection',
//        'dsn' => 'mysql:host=localhost;dbname=burlang',
//        'username' => 'root',
//        'password' => '',
//        'charset' => 'utf8',
//    ],

//    'authclients' => [
//        'vkontakte' => [
//            'class'        => 'app\components\authclients\VKontakte',
//            'clientId'     => '',
//            'clientSecret' => '',
//        ],
//        'facebook' => [
//            'class'        => 'dektrium\user\clients\Facebook',
//            'clientId'     => '',
//            'clientSecret' => '',
//        ],
//    ],

    'components.mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
    ],
];
