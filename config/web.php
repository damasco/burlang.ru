<?php

$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'burlang.ru',
    'name' => 'Burlang',
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'timeZone' => 'Asia/Irkutsk',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        \app\api\v1\Bootstrap::class,
        \app\bootstrap\ContainerBootstrap::class,
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
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
            'class' => \dektrium\rbac\components\DbManager::class,
            'cache' => 'cache',
        ],
        'assetManager' => [
            'class' => \yii\web\AssetManager::class,
            'appendTimestamp' => true,
        ],
        'request' => [
            'cookieValidationKey' => $params['components.request.key'],
            'parsers' => [
                'application/json' => yii\web\JsonParser::class,
            ]
        ],
        'response' => [
            'class' => \yii\web\Response::class,
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
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
                    'class' => \yii\log\FileTarget::class,
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
        'devicedetect' => \alexandernst\devicedetect\DeviceDetect::class,
        'page' => \app\components\Page::class
    ],
    'modules' => [
        'user' => [
            'class' => \dektrium\user\Module::class,
            'enableRegistration' => false,
            'adminPermission' => 'admin',
            'modelMap' => [
                'User' => \app\modules\user\models\User::class,
            ],
            'controllerMap' => [
                'profile' => \app\modules\user\controllers\ProfileController::class,
            ],
        ],
        'rbac' => \dektrium\rbac\RbacWebModule::class,
        'v1' => \app\api\v1\Module::class,
    ],
    'params' => $params,
];

return $config;
