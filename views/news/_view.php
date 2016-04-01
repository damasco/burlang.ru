<?php

use yii\helpers\Html;

/* @var $model \app\models\News */
?>

<div class="news-item">
    <h3><?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?></h3>
    <p class="text-danger"><?= Yii::$app->formatter->asDate($model->created_at) ?></p>
    <div class="description">
        <?= nl2br(Html::encode($model->description)) ?>
    </div>
</div>


