<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

final class HyperscriptAsset extends AssetBundle
{
    public $sourcePath = '@npm/hyperscript.org';
    public $js = [
        'dist/_hyperscript.min.js',
    ];
}
