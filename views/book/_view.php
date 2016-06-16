<?php

use yii\helpers\Html;

/* @var \yii\web\View $this */
/* @var \app\models\Book $model */
?>

<div class="col-sm-4">

    <div class="book-item">

        <h2>
            <?= Html::a(Html::encode($model->title), ['book/view', 'id' => $model->id]) ?>
            <?php if (!$model->active): ?>
                <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
            <?php endif ?>
        </h2>

        <p><?= nl2br(Html::encode($model->description)) ?></p>

        <?= Html::a(Yii::t('app', 'More') . ' →',
            ['/book/view', 'id' => $model->id],
            ['class' => 'btn btn-custom btn-sm']) ?>

    </div>

</div>
