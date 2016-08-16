<?php

use yii\bootstrap\Html;
use yii\helpers\Markdown;
use yii\helpers\HtmlPurifier;
use app\widgets\ChapterMenuWidget;

/**
 * @var yii\web\View $this
 * @var app\models\BookChapter $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book->title, 'url' => ['view', 'slug' => $model->book->slug]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-view">

    <h1 class="hidden-xs">
        <?= Html::encode($model->book->title) ?>
    </h1>

    <?= $this->render('/book/_header', ['model' => $model->book]) ?>

    <div class="row">
        <div class="col-sm-3 hidden-xs">
            <?= ChapterMenuWidget::widget(['book' => $model->book, 'active_id' => $model->id]) ?>
        </div>
        <div class="col-sm-9 col-xs-12">
            <?php if (Yii::$app->user->can('adminBook')): ?>
                <p>
                    <?= Html::a(
                        Html::icon('pencil') . ' ' . Yii::t('app', 'Edit chapter'),
                        ['chapter-update', 'id' => $model->id], ['class' => 'btn btn-sm btn-default']
                    ) ?>
                    <?= Html::a(
                        Html::icon('trash') . ' ' . Yii::t('app', 'Delete chapter'),
                        ['chapter-delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-sm btn-default',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]
                    ) ?>
                </p>
            <?php endif ?>
            <div class="content">
                <?= HtmlPurifier::process(Markdown::process($model->content, 'gfm')) ?>
            </div>
        </div>
    </div>

</div>
