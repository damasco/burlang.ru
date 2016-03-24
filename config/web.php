<?php

$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'burlang.ru',
    'name' => 'Burlang',
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'timeZone' => 'Asia/Irkutsk',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'db' => $params['components.db'],
        'cache' => $params['components.cache'],
        'mailer' => $params['components.mailer'],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(__DIR__ . '/urls.php'),
        ],
//        'authClientCollection' => [
//            'class'   => '\yii\authclient\Collection',
//            'clients' => $params['authclients'],
//        ],
        'request' => [
            'cookieValidationKey' => 'l-2C_lNvBwQDe4_LLC5eaUhQmvV9yQRm',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
