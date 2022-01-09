<?php

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        SendKeysAsset::class,
        BootboxAsset::class,
    ];
}
