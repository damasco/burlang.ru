<?php

use app\models\Page;
use yii\bootstrap\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
use yii\web\View;

/**
 * @var View $this
 * @var Page $model
 */

$this->title = $model->title;

if (!Yii::$app->user->isGuest) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    <?php if (!$model->active): ?>
        <p>
            <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
        </p>
    <?php endif ?>
    <?php if (Yii::$app->user->can('admin')): ?>
        <p>
            <?= Html::a(
                Html::icon('pencil') . ' ' . Yii::t('app', 'Edit'),
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary']
            ) ?>
            <?php if (!$model->static): ?>
                <?= Html::a(Html::icon('trash') . ' ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete?'),
                        'method' => 'post',
                    ],
                ]) ?>
            <?php endif ?>
        </p>
    <?php endif ?>
    <div class="image-responsive-container">
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
