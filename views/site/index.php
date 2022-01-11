<?php

use app\components\DeviceDetect\DeviceDetectInterface;
use app\widgets\Comments;
use app\widgets\LastNews;
use yii\web\View;

/**
 * @var View $this
 * @var DeviceDetectInterface $deviceDetect
 */

$this->title = Yii::$app->name . ' - Русско-Бурятский, Бурятско-Русский электронный словарь';
?>
<div class="site-index">
    <div class="row mt-10">
        <div class="col-sm-6">
            <?= $this->render('_russian_form', ['deviceDetect' => $deviceDetect]) ?>
        </div>
        <div class="col-sm-6">
            <?= $this->render('_buryat_form', ['deviceDetect' => $deviceDetect]) ?>
        </div>
    </div>
    <div class="row mt-10">
        <div class="col-sm-4 col-sm-push-8">
            <?= LastNews::widget() ?>
        </div>
        <div class="col-sm-8 col-sm-pull-4">
            <?= Comments::widget() ?>
        </div>
    </div>
</div>
