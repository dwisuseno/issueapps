<?php

$params = require(__DIR__ . '/params.php');
$GLOBALS['project'] = "Test";
$_SESSION["project"] = "Default";

$config = [
    'id' => 'basic',
    'timeZone' => 'Asia/Brunei',
    'basePath' => dirname(__DIR__),
    'name' => 'Mining Technology Apps',
    'bootstrap' => ['log'],
    'modules' => [
        'system' => [
            'class' => 'app\modules\system\Module',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // see settings on http://demos.krajee.com/grid#module
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
            // see settings on http://demos.krajee.com/datecontrol#module
        ],
        // If you use tree table
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            // see settings on http://demos.krajee.com/tree-manager#module
        ],
        'backlog' => [
            'class' => 'app\modules\backlog\Module',
        ],
        'datamaster' => [
            'class' => 'app\modules\datamaster\Module',
        ],
        'tasklist' => [
            'class' => 'app\modules\tasklist\Module',
        ],
        'done' => [
            'class' => 'app\modules\done\Module',
        ],
        'confirmation' => [
            'class' => 'app\modules\confirmation\Module',
        ],
        'sprintnow' => [
            'class' => 'app\modules\sprintnow\Module',
        ],
        'project' => [
            'class' => 'app\modules\project\Module',
        ],
        'frontend' => [
            'class' => 'app\modules\frontend\Module',
        ],

    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5dwdw3e3fap6KM1b0aa0IYlpr_cM34kLtdwfesfesefdwdwawdawd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            //'useFileTransport' => false,//set this property to false to send mails to real email addresses
            //comment the following array to send mail using php's mail function
            // gunakan pengaturan ini untuk pengiriman email.
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp server',
                'username' => 'YOUREMAIL',
                'password' => 'YOURPASSWORD',
                'port' => '465',
                'encryption' => 'ssl',
            ],
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
        //'db' => $sql_database_connection,
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                // ...
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
