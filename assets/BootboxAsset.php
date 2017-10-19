<?php

namespace app\assets;

use Yii;
use yii\web\AssetBundle;

class BootboxAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootbox';

    public $js = [
        'bootbox.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        parent::init();
        Yii::$app->view->registerJs('
            yii.confirm = function(message, ok, cancel) {
                bootbox.confirm({
                    title: "' . Yii::t('app', 'Confirm') . '",
                    message: message,
                    onEscape: true,
                    buttons: {
                        confirm: {
                            label: \'<i class="glyphicon glyphicon-ok"></i> ' . Yii::t('app', 'Yes') . '\',
                            className: \'btn-success\'
                        },
                        cancel: {
                            label: "' . Yii::t('app', 'Cancel') . '",
                            className: \'btn-danger\'
                        }
                    },
                    callback: function(result) {
                        if (result) { !ok || ok(); } else { !cancel || cancel(); }
                    }
                });
            }
        ');
    }
}
