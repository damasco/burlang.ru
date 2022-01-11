<?php

use yii\bootstrap\Html;

/**
 * @var \yii\web\View $this
 * @var \app\models\Book $model
 */
?>
<?php if (!$model->active): ?>
    <p>
        <span class="label label-default">Неактивный</span>
    </p>
<?php endif ?>
<?php if (Yii::$app->user->can('adminBook')): ?>
    <p>
        <?= Html::a(
            Html::icon('pencil') . ' Редактировать',
            ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']
        ) ?>
        <?= Html::a(
            Html::icon('trash') . ' Удалить',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить?',
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>
<?php endif ?>
