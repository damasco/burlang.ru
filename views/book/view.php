<?php

use yii\bootstrap\Html;
use app\widgets\ChapterMenuWidget;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

/**
 * @var yii\web\View $this
 * @var app\models\Book $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-view">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_header', ['model' => $model]) ?>

    <div class="row">
        <div class="col-sm-3">
            <?= ChapterMenuWidget::widget(['book' => $model]) ?>
        </div>
        <div class="col-sm-9 col-xs-12">
            <p>
                <?= HtmlPurifier::process(Markdown::process($model->content, 'gfm')) ?>
            </p>
        </div>
    </div>
</div>
