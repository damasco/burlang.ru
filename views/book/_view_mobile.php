<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \app\models\Book $model
 */
?>

<div class="col-sm-12">
    <div class="book-item-mobile">
        <h2>
            <?= Html::a(Html::encode($model->title), ['book/view', 'slug' => $model->slug]) ?>
        </h2>

        <?php if (!$model->active): ?>
            <p>
                <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
            </p>
        <?php endif ?>

        <p class="hint-block">
            <?= Yii::t('app', 'Last update') ?>: <?= Yii::$app->formatter->asDateTime($model->getLastUpdate()) ?>
        </p>
    </div>
</div>
