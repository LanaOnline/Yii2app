<?php

$params = require __DIR__ . '/params.php';
$db = file_exists( __DIR__.'/db_local.php')
    ?(require __DIR__ . '/db_local.php')
    :(require __DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'activity' => [
            'class' => \app\components\ActivityComponent::class,
            'activity_class' => '\app\models\Activity'
        ],
        'authManager'=>[
            'class'=>'\yii\rbac\DbManager'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter'=>[
            'class'=>'\yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y'
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'enableSwiftMailerLogging' => true,
//            'viewPath' => set path to view files if they are not in the mail folder
            'transport' => [
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.google.com',
                'username' => 'geekbrains@onedeveloper.ru',//todo:change host, username and pass
                'password' => 'qazWSX',
                'port' => '587',
                'encryption' => 'tls'
            ]
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
