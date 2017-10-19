<?php

/**
 * Application configuration shared by all test types
 */
return yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/web.php',
    require __DIR__ . '/web-local.php',
    require __DIR__ . '/test-local.php',
    [
        'id' => 'burlang-tests',
        'language' => 'en-US',
        'components' => [
            'mailer' => [
                'useFileTransport' => true,
            ],
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => true,
            ],
            'assetManager' => [
                'basePath' => __DIR__ . '/../web/assets',
            ],
            'request' => [
                'cookieValidationKey' => 'test',
                'enableCsrfValidation' => false,
                // but if you absolutely need it set cookie domain to localhost
                /*
                'csrfCookie' => [
                    'domain' => 'localhost',
                ],
                */
            ],
        ],
    ]
);
