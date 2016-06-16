<?php

use yii\helpers\Html;

/* @var \yii\web\View $this */
/* @var \app\models\Book $model */
?>

<div class="book-item">

    <h2>
        <?= Html::a(Html::encode($model->title), ['book/view', 'id' => $model->id]) ?>
        <?php if (!$model->active): ?>
            <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
        <?php endif ?>
    </h2>

    <p><?= nl2br(Html::encode($model->description)) ?></p>

    <hr>

</div>
