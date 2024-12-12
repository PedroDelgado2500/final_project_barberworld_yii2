<?php

use yii\filters\AccessControl;


$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'helloworld',
            'enableCsrfValidation' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
    
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],*/
        
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        /*'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
            'messageConfig' => [
                'from' => ['admin@website.com' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
        ],*///comentar esse mailer caso der erro
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'as access' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'], // Apenas o administrador pode acessar
                ],
            ],
        ],

        'i18n' => [
            'translations' => [
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // example: @app/messages/fr/user.php
                ]
            ],
        ],
        
        
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
        'barbearia' => 'barbearia/index',
        'barbearia/<action:(create|view|update|delete)>/<id:\d+>' => 'barbearia/<action>',

        'utilizador' => 'utilizador/index',
        'utilizador/<action:(create|view|update|delete)>/<id:\d+>' => 'utilizador/<action>',

        'user/admin' => 'user/admin/index',
        'user/admin/<action:(create|view|update|delete)>/<id:\d+>' => 'user/admin/<action>',

        'estoque' => 'estoque/index',
        'estoque/<action:(create|view|update|delete)>/<id:\d+>' => 'estoque/<action>',

        'produto' => 'produto/index',
        'produto/<action:(create|view|update|delete)>/<id:\d+>' => 'produto/<action>',

        'servico' => 'servico/index',
        'servico/<action:(create|view|update|delete)>/<id:\d+>' => 'servico/<action>',

        'compra' => 'compra/index',
        'compra/<action:(create|view|update|delete)>/<id:\d+>' => 'compra/<action>',

        'reserva' => 'reserva/index',
        'reserva/<action:(create|view|update|delete)>/<id:\d+>' => 'reserva/<action>',

        
        
            ],
        ],
        
    ],
    'modules' => [
        
        'user' => [
            'class' => 'amnah\yii2\user\Module',
            'requireEmail' => false,
            'requireUsername' => true
        ],
    ],
    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}


return $config;