<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\helpers\HtmlPurifier;

/* @var yii\web\View $this */
/* @var app\models\Page $model */

$this->title = $model->title;

if (!Yii::$app->user->isGuest) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-view">

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

    <div class="content">
        <?= HtmlPurifier::process(Markdown::process($model->content, 'gfm')) ?>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="mt-20 comment-block">
                <?= $this->render('/_comments') ?>
            </div>
        </div>
    </div>

</div>
