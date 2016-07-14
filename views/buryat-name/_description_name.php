<?php

/* @var \app\models\BuryatName $model */
?>

<div class="alert alert-success mb-0">

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