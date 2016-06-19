<?php

use yii\helpers\Html;
use app\widgets\BookChapterWidget;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

/* @var yii\web\View $this */
/* @var app\models\Book $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-view">

    <h1>
        <?= Html::encode($this->title) ?>
        <?php if (!$model->active): ?>
            <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
        <?php endif ?>
    </h1>

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
        </p>
    <?php endif ?>

    <div class="row">
        <div class="col-sm-3">
            <?= BookChapterWidget::widget(['book' => $model]) ?>
        </div>
        <div class="col-sm-9 col-xs-12">
            <p>
                <?= HtmlPurifier::process(Markdown::process($model->content, 'extra')) ?>
            </p>
        </div>
    </div>
</div>
