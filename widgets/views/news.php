<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

/* @var $model \app\models\News */
?>

<h3><?= Yii::t('app', 'News') ?></h3>
<?php foreach ($model as $news): ?>
    <div style="margin-bottom: 15px;">
        <h4><?= Html::a($news->title, ['news/view', 'id' => $news->id]) ?></h4>
        <p class="text-danger"><?= Yii::$app->formatter->asDate($news->created_at) ?></p>
        <div class="content">
            <?= HtmlPurifier::process(Markdown::process($news->content, 'gfm')) ?>
        </div>
    </div>
<?php endforeach ?>