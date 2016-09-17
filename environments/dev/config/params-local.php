<?php
return [
//    'components.db' => [
//        'class' => 'yii\db\Connection',
//        'dsn' => 'mysql:host=localhost;dbname=burlang',
//        'username' => 'root',
//        'password' => '',
//        'charset' => 'utf8',
//        'enableSchemaCache' => true
//    ],

    'components.mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
    ],
    
//    'test.users' => [
//        'admin' => [
//            'username' => 'testAdmin',
//            'password' => 'testAdmin',
//        ],
//        'moderator' => [
//            'username' => 'testModerator',
//            'password' => 'testModerator',               
//        ],
//        'user' => [
//            'username' => 'testUser',
//            'password' => 'testUser',
//        ]
//    ],

];
