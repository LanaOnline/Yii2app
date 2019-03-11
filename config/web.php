<?php

$params = require __DIR__ . '/params.php';
$db = file_exists( __DIR__.'/db_local.php')
        ?(require __DIR__ . '/db_local.php')
        :(require __DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'language' => 'ru_RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'as lgo'=>\app\behaviors\LogMyBehavior::class,
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        'formatter'=>[
            'class'=>'\yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y'
        ],
        'rbac'=>\app\components\RbacComponent::class,
        'request' => [
            'as logme'=>\app\behaviors\LogMyBehavior::class,
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VfZ0NVsq9UktPY5naIu71XxmzRndCbvo',
        ],
        'activity' => [
            'class' => \app\components\ActivityComponent::class,
            'activity_class' => '\app\models\Activity'
        ],
        'auth' => \app\components\UsersAuthComponent::class,
        'authManager'=>[
            'class'=>'\yii\rbac\DbManager'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            ],
//        'cache' => [
//            'class' => 'yii\caching\MemCache',
//            'useMemcached' => true
//        ],
        'dao' => [
            'class' => \app\components\DaoComponent::class
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'messenger' => [
            'class' => 'app/components/MessengerComponent'
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                'shortUrl' => 'actualUrl' // change url
//                'shortUrl<action>' => 'actualUrl<action>' // change url with actions
//                'shortUrl/edit/<id:\d+>' => 'actualUrl/edit' // change url with parameters from 'edit?id=1' to 'edit/1'
//                'moduleName' => 'longModuleIndexUrl' // change Module url
//                '<module>/<controller>/<action>' => '<module>/<controller>/<action>' // change Module url

            ],
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
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
