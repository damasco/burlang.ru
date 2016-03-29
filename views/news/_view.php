<?php

use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
use yii\helpers\Html;

/* @var $model \app\models\News */
?>

<div class="news-item">
    <h3><?= Html::a($model->title, ['view', 'id' => $model->id]) ?></h3>
    <p class="text-danger"><?= Yii::$app->formatter->asDate($model->created_at) ?></p>
    <div class="content">
        <?= HtmlPurifier::process(Markdown::process($model->content, 'gfm')) ?>
    </div>
</div>


