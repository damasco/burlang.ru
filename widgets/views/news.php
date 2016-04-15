<?php

use yii\helpers\Html;

/* @var $model \app\models\News */
?>

<h3><?= Yii::t('app', 'News') ?></h3>

<?php foreach ($model as $news): ?>
    <div class="news-item">
        <h4><?= Html::a(Html::encode($news->title), ['news/view', 'id' => $news->id]) ?></h4>
        <p class="text-danger"><?= Yii::$app->formatter->asDate($news->created_at) ?></p>
        <p class="description">
            <?= nl2br(Html::encode($news->description)) ?>
        </p>
        <?= Html::a(Yii::t('app', 'Read more'), ['/news/view', 'id' => $news->id], ['class' => 'btn btn-default btn-sm']) ?>
    </div>
<?php endforeach ?>