<?php

use yii\bootstrap\Html;

/**
 * @var \yii\web\View $this
 * @var \app\models\Book $model
 */
?>

<?php if (!$model->active): ?>
    <p>
        <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
    </p>
<?php endif ?>

<?php if (Yii::$app->user->can('adminBook')): ?>
    <p>
        <?= Html::a(
            Html::icon('pencil') . ' ' . Yii::t('app', 'Edit'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']
        ) ?>
        <?= Html::a(
            Html::icon('trash') . ' ' . Yii::t('app', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete?'),
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>
<?php endif ?>