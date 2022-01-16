<?php

use yii\helpers\Html;

/**
 * @var \app\models\News $model
 */
?>
<div class="news-item">
    <h2>
        <?= Html::a(Html::encode($model->title), ['/news/view', 'slug' => $model->slug]) ?>
    </h2>
    <?php if (!$model->active): ?>
        <p>
            <span class="label label-default">Неактивный</span>
        </p>
    <?php endif ?>
    <p><?= Yii::$app->formatter->asDate($model->created_at) ?></p>
    <p class="description">
        <?= nl2br(Html::encode($model->description)) ?>
    </p>
</div>


