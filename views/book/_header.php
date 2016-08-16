<?php

use yii\bootstrap\Html;

/**
 * @var \yii\web\View $this
 * @var \app\models\Book $model
 */
?>

<p class="hint-block">
    <?= Yii::t('app', 'Last update') ?>: <?= Yii::$app->formatter->asDateTime($model->getLastUpdate()) ?>
</p>

<?php if (!$model->active): ?>
    <p>
        <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
    </p>
<?php endif ?>

<?php if (Yii::$app->user->can('adminBook')): ?>
    <p>
        <?= Html::a(Html::icon('pencil') . ' ' . Yii::t('app', 'Edit book'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Html::icon('trash') . ' ' . Yii::t('app', 'Delete book'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php endif ?>