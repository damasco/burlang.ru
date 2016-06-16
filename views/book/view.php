<?php

use yii\helpers\Html;

/* @var yii\web\View $this */
/* @var app\models\Book $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('app', 'Add chapter'), ['chapter-create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif ?>

    <p>
        <?= Html::encode($model->description) ?>
    </p>

    <?php /* @var \app\models\BookChapter $chapter */ ?>
    <?php foreach ($model->chapters as $chapter): ?>
        <h3><?= Html::a(Html::encode($chapter->title), ['chapter', 'id' => $chapter->id]) ?></h3>
    <?php endforeach; ?>

</div>
