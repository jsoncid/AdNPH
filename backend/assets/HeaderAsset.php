<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 3:14 PM
 */

namespace backend\assets;

use common\assets\AdminLte;
use common\assets\Html5shiv;
use yii\web\AssetBundle;
use yii\web\YiiAsset;
use rmrevin\yii\fontawesome\NpmFreeAssetBundle;

class HeaderAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@backend/web/bundle';

    /**
     * @var array
     */
    public $css = [
        'header.css'
    ];
    /**
     * @var array
     */
    public $js = [
        'app.js',
        'js/main.js'
    ];

    public $publishOptions = [
        'only' => [
            '*.css',
            '*.js',
            '../img/*'
        ],
        "forceCopy" => YII_ENV_DEV,
    ];

    /**
     * @var array
     */
    
}
