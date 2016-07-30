<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \app\models\Book $model
 */
?>

<div class="col-sm-4">

    <div class="book-item">

        <h2>
            <?= Html::a(Html::encode($model->title), ['book/view', 'slug' => $model->slug]) ?>
            <?php if (!$model->active): ?>
                <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
            <?php endif ?>
        </h2>

        <p><?= nl2br(Html::encode($model->description)) ?></p>

        <?= Html::a(Yii::t('app', 'Read') . ' →',
            ['/book/view', 'slug' => $model->slug],
            ['class' => 'btn btn-custom btn-sm']) ?>

        <hr>

        <p class="hint">
            <?= Yii::t('app', 'Last update') ?>: <br>
            <?= Yii::$app->formatter->asDateTime($model->getLastUpdate()) ?>
        </p>

    </div>

</div>
