<?php

use yii\helpers\Html;

/* @var $model \app\models\News */
?>

<div class="news-item">
    <h3><?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?></h3>
    <p class="text-danger"><?= Yii::$app->formatter->asDate($model->created_at) ?></p>
    <p class="description">
        <?= nl2br(Html::encode($model->description)) ?>
    </p>
    <?= Html::a(Yii::t('app', 'Read more'), ['/news/view', 'id' => $model->id], ['class' => 'btn btn-default btn-sm']) ?>
</div>


