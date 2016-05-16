<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
?>
<div class="site-translation-service bg-warning text-center">

    <h4><?= Yii::t('app', 'Translation service') ?></h4>

    <p class="text-muted">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    </p>

    <?= Html::a(Yii::t('app', 'More'), ['translation-service/index'], ['class' => 'btn btn-success btn-sm']) ?>

</div>