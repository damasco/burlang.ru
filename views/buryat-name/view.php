<?php

use yii\bootstrap\Html;

/**
 * @var yii\web\View $this
 * @var app\models\BuryatName $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat names'), 'url' => Yii::$app->user->isGuest ? ['index'] : ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="buryat-name-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('moderator')): ?>
        <p>
            <?= Html::a(
                Html::icon('pencil'). ' ' . Yii::t('app', 'Edit'),
                ['update', 'id' => $model->id], ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a(
                Html::icon('trash'). ' ' . Yii::t('app', 'Delete'),
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

    <?= $this->render('_description_name', [
        'model' => $model
    ]) ?>

</div>
