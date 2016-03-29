<?php

namespace app\assets;

use yii\web\AssetBundle;

class SendKeysAsset extends AssetBundle
{
    public $sourcePath = '@bower/bililiteRange/';

    public $js = [
        'bililiteRange.js',
        'jquery.sendkeys.js'
    ];

    public $css = [
    ];
}