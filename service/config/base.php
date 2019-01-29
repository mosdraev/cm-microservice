<?php

$config = [
    'id' => 'contact-service-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'contact\controllers',
    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@contact' => dirname(__DIR__),
        // Add this alias when using asset-packagist.org instead of fxp/composer-asset-plugin
        '@bower' => '@vendor/bower-asset',
    ],
    'modules' => [],
    'components' => [
        'db' => [
            'class'    => 'yii\db\Connection',
            'dsn'	   => getenv('DB_DSN'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset'  => getenv('DB_CHARSET')
        ],
        'request' => [
            // Cookie and CSRF validation are disabled for this service
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                // default rules for URL routes
                '<module:\w+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<submodule:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<submodule>/<controller>/<action>',
                [
                    'class' => 'yii\rest\UrlRule',
                    'pluralize' => false
                ]
            ]
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
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;