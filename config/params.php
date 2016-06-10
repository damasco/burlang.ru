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
    'authclients' => [],

    'adminEmail' => 'dbulats88@gmail.com',

    'buryat-field-template' => '{label}
                                <div class="input-group">
                                    {input}
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default add-buryat-word">ү</button>
                                        <button type="button" class="btn btn-default add-buryat-word">һ</button>
                                        <button type="button" class="btn btn-default add-buryat-word">ө</button>
                                    </span>
                                </div>
                                {error}{hint}',

];
