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

    <p><?= Html::encode($model->description) ?></p>

    <?= Html::a(Yii::t('app', 'Read more') . ' →',
        ['/news/view', 'id' => $model->id],
        ['class' => 'btn btn-default btn-sm']) ?>

    <hr>

</div>
