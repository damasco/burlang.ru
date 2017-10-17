<?php

namespace app\assets;

use yii\web\AssetBundle;

class SendKeysAsset extends AssetBundle
{
    public $sourcePath = '@bower/bililiterange/';

    public $js = [
        'bililiteRange.js',
        'jquery.sendkeys.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}