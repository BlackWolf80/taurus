<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'layout' => 'default',
    'modules' => [
        'partner' => [
            'class' => 'app\modules\partner\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3245.k34j5lk34j5l3kj45l3j45bvjhv54nv645b6v4sdvlku98u9uljk',
            'baseUrl'=> '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
//            'loginUrl' => '/news',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'danil.g.ishutin@yandex.ru',
                'password' => 'SXSu232htx',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'robokassa' => [
            'class'          => '\robokassa\Merchant',
            'baseUrl'        => 'https://auth.robokassa.ru/Merchant/Index.aspx',
            'sMerchantLogin'    =>  'market.firma-taurus.ru', // логин Robokassa
            'sMerchantPass1'    =>  'V28Qk3CAom3FWzW5dbXV', // пароль1 Robokassa
            'sMerchantPass2'    =>  'N3kiaBy4pZwh62bt6zvK', // пароль2 Robokassa
            'sMerchantTestPass1'    =>  'Jt48Bi3uvYGXvV2OFPb3', // тестовый пароль1 Robokassa
            'sMerchantTestPass2'    =>  'YQ5egYjk200lvhEzbM4N', // тестовый пароль2 Robokassa
            'isTest'        =>  1,  // или 0 - боевой режим
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
                '/' => 'site/index',
                'login' => 'site/login',
                'wish_list' => 'wish/wish_list',
                'partner' => 'partner/',
                'payment' => 'payment/',
                '<action:(login|logout)>' => 'site/<action>',
                '<action_post:\w+>' => 'page/<action_post>',
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
