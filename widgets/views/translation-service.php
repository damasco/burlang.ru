<?php

use yii\helpers\Html;

/* @var $model \app\models\Page */
?>
<div class="translation-service-widget bg-warning text-center">

    <h4><?= $model->title ?></h4>

    <p class="text-muted">
        <?= $model->description ?>
    </p>

    <?= Html::a(Yii::t('app', 'More'), ['/page/' . $model->link], ['class' => 'btn btn-success btn-sm']) ?>

</div>