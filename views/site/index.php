<?php

/**
 * @var yii\web\View $this
 * @var mixed $russian_word
 * @var mixed $buryat_word
 * @var mixed $buryat_name
 */

$this->title = Yii::$app->name . ' - ' . Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary');
?>
<div class="site-index">
    <div class="row mt-10">
        <div class="col-sm-6">
            <?= $this->render('_russian_form') ?>
        </div>
        <div class="col-sm-6">
            <?= $this->render('_buryat_form') ?>
        </div>
    </div>
    <div class="row mt-10">
        <div class="col-sm-4 col-sm-push-8">
            <?= \app\widgets\News::widget() ?>
        </div>
        <div class="col-sm-8 col-sm-pull-4">
            <?= $this->render('/_comments') ?>
        </div>
    </div>
</div>
