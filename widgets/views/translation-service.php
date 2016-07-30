<?php

use yii\helpers\Html;

/**
 * @var \app\models\Page $model
 */
?>

<div class="translation-service-widget bg-warning text-center">

    <h4><?= $model->title ?></h4>

    <p class="text-muted">
        <?= $model->description ?>
    </p>

    <?= Html::a(Yii::t('app', 'More'), ['/page/view', 'link' => $model->link], ['class' => 'btn btn-success btn-sm']) ?>

</div>