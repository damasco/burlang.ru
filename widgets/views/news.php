<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

/* @var $model \app\models\News */
?>

<h3><?= Yii::t('app', 'News') ?></h3>

<?php foreach ($model as $news): ?>
    <div class="news-item">
        <h4><?= Html::a(Html::encode($news->title), ['news/view', 'id' => $news->id]) ?></h4>
        <p class="text-danger"><?= Yii::$app->formatter->asDate($news->created_at) ?></p>
        <div class="description">
            <?= Html::encode($news->description) ?>
        </div>
    </div>
<?php endforeach ?>