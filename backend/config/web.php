<?php



$config = [
    'homeUrl' => Yii::getAlias('@backendUrl'),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'timeline-event/index',
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => env('BACKEND_BASE_URL'),
        ],
        'user' => [
            'class' => yii\web\User::class,
            'identityClass' => common\models\User::class,
            'loginUrl' => ['sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@app/runtime/logs/myapp.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 20,
                ],
            ],
        ],
    ],
        
        

    

    'modules' => [


        'content' => [
            'class' => backend\modules\content\Module::class,
        ],
        'widget' => [
            'class' => backend\modules\widget\Module::class,
        ],
        'file' => [
            'class' => backend\modules\file\Module::class,
        ],
        'system' => [
            'class' => backend\modules\system\Module::class,
        ],
        'translation' => [
            'class' => backend\modules\translation\Module::class,
        ],
        'rbac' => [
            'class' => backend\modules\rbac\Module::class,
            'defaultRoute' => 'rbac-auth-item/index',
        ],
        'records' => [
            'class' => 'backend\modules\records\records',
        ],
        'transmittal' => [
            'class' => 'backend\modules\transmittal\transmittal',
        ],
        'laboratoryrequestprinting' => [
            'class' => 'backend\modules\laboratoryrequestprinting\laboratoryrequestprinting',
        ],

        'radiologyrequestprinting' => [
            'class' => 'backend\modules\radiologyrequestprinting\radiologyrequestprinting',
        ],
        'dietrequestprinting' => [
            'class' => 'backend\modules\dietrequestprinting\dietrequestprinting',
        ],
        'piu' => [
            'class' => 'backend\modules\piu\piu',
        ],
        'er' => [
            'class' => 'backend\modules\er\er',
        ],    
        'labresult' => [
            'class' => 'backend\modules\labresult\labresult',  
        ],
        'labresultlogs' => [
            'class' => 'backend\modules\labresultlogs\labresultlogs',
        ],
        'radresult' => [
            'class' => 'backend\modules\radresult\radresult',
        ],
        'pdfjs' => [
            'class' => '\yii2assets\pdfjs\Module',

        ],
        'radresultlogs' => [
            'class' => 'backend\modules\radresultlogs\radresultlogs',
        ],
        'patientdischargeclearance' => [
            'class' => 'backend\modules\patientdischargeclearance\patientdischargeclearance',
        ],

    ],
    'as globalAccess' => [
        'class' => common\behaviors\GlobalAccessBehavior::class,
        'rules' => [
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['?'],
                'actions' => ['login'],
            ],
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['@'],
                'actions' => ['logout'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'roles' => ['?', '@'],
                'actions' => ['error'],
            ],
            [
                'controllers' => ['debug/default'],
                'allow' => true,
                'roles' => ['?'],
            ],
            [
                'controllers' => ['user'],
                'allow' => true,
                'roles' => ['administrator'],
            ],
            [
                'controllers' => ['user'],
                'allow' => false,
            ],
            [
                'allow' => true,
                'roles' => ['manager', 'administrator'],
            ],
        ],
    ],
 
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates'),
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'backend',
            ],
        ],
    ];
}

return $config;
