<?php

use app\components\DeviceDetect\DeviceDetectInterface;
use app\widgets\LastNews;
use yii\web\View;

/**
 * @var View $this
 * @var DeviceDetectInterface $deviceDetect
 */

$this->title = Yii::$app->name . ' - ' . Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary');
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
            <?= $this->render('/_comments') ?>
        </div>
    </div>
</div>
