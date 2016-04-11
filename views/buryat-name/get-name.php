<?php

/* @var $this yii\web\View */
/* @var $model app\models\BuryatName */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat names'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h3><?= $this->title ?></h3>
<div class="alert alert-success">
    <p><strong><?= $model->description ?></strong></p>
    <?php if ($model->note): ?>
        <p><?= $model->note ?></p>
    <?php endif ?>
    <?php if ($model->male): ?>
        <span class="label label-default"><?= Yii::t('app', 'Male name') ?></span>
    <?php endif ?>
    <?php if ($model->female): ?>
        <span class="label label-default"><?= Yii::t('app', 'Female name') ?></span>
    <?php endif ?>
</div>
