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
    'bootstrap' => ['log', 'app\api\v1\Bootstrap'],
    'components' => [
        'db' => $params['components.db'],
        'cache' => $params['components.cache'],
        'mailer' => $params['components.mailer'],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require __DIR__ . '/urls.php',
        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
            'cache' => 'cache',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'appendTimestamp' => true,
        ],
        'request' => [
            'cookieValidationKey' => $params['components.request.key'],
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/modules/user/views'
                ],
            ],
        ],
        'devicedetect' => [
            'class' => 'alexandernst\devicedetect\DeviceDetect',
        ],
        'page' => [
            'class' => 'app\components\Page',
        ]
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableRegistration' => false,
            'adminPermission' => 'admin',
            'modelMap' => [
                'User' => 'app\modules\user\models\User',
            ],
            'controllerMap' => [
                'profile' => 'app\modules\user\controllers\ProfileController',
            ],
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'v1' => [
            'class' => 'app\api\v1\Module',
        ],
    ],
    'params' => $params,

    // URLs with trailing slashes should be redirected to URLs without trailig slashes
//    'on beforeRequest' => function () {
//        $pathInfo = Yii::$app->request->pathInfo;
//        $query = Yii::$app->request->queryString;
//        if (!empty($pathInfo) && substr($pathInfo, -1) === '/') {
//            $url = '/' . substr($pathInfo, 0, -1);
//            if ($query) {
//                $url .= '?' . $query;
//            }
//            Yii::$app->response->redirect($url, 301);
//        }
//    },
];

return $config;