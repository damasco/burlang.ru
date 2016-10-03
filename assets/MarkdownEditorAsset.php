<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * MarkdownEditorAsset groups assets for markdown editor
 */
class MarkdownEditorAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/markdown';

    public $js = [
        'editor.js',
    ];

    public $css = [
        'editor.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'app\assets\CodeMirrorAsset',
        'app\assets\CodeMirrorButtonsAsset',
    ];
}
