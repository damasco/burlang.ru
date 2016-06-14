<?php

use yii\helpers\Html;

/* @var \app\models\News $model */
?>

<div class="news-item">

    <h4>
        <?= Html::a(Html::encode($model->title), ['/news/view', 'id' => $model->id]) ?>
        <?php if (!$model->active): ?>
            <span class="label label-default"><?= Yii::t('app', 'Inactive') ?></span>
        <?php endif ?>
    </h4>

    <p class="text-danger"><?= Yii::$app->formatter->asDate($model->created_at) ?></p>

    <p class="description">
        <?= nl2br(Html::encode($model->description)) ?>
    </p>

    <?= Html::a(Yii::t('app', 'Read more') . ' →',
        ['/news/view', 'id' => $model->id],
        ['class' => 'btn btn-default btn-sm']) ?>

</div>


