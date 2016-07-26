<?php

use yii\helpers\Html;

/* @var \app\models\News $model */
?>

<div class="news-item">

    <h2>
        <?= Html::a(Html::encode($model->title), ['/news/view', 'slug' => $model->slug]) ?>
        <?php if (!$model->active): ?>
            <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
        <?php endif ?>
    </h2>

    <p class="text-danger"><?= Yii::$app->formatter->asDate($model->created_at) ?></p>

    <p class="description">
        <?= nl2br(Html::encode($model->description)) ?>
    </p>

    <?= Html::a(Yii::t('app', 'Read more') . ' →',
        ['/news/view', 'slug' => $model->slug],
        ['class' => 'btn btn-custom btn-sm']) ?>

</div>


