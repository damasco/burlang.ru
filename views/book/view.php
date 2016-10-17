<?php

use yii\bootstrap\Html;
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
            <?= \app\widgets\ChaptersMenu::widget(['book' => $model]) ?>
        </div>
        <div class="col-sm-9 col-xs-12">
            <div class="image-responsive-container">
                <?= HtmlPurifier::process(Markdown::process($model->content, 'gfm')) ?>
            </div>
        </div>
    </div>
</div>
