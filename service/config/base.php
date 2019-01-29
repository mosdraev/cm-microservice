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
        'request' => [
            // Cookie and CSRF validation are disabled for this service
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                // default rules for URL routes
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ]
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