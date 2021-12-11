<?php

use app\models\News;

/**
 * @var News[] $lastNews
 */
?>
<div class="news-widget">
    <h3><?= Yii::t('app', 'News') ?></h3>
    <?php foreach ($lastNews as $news): ?>
        <?= $this->render('/news/_view', ['model' => $news]) ?>
    <?php endforeach ?>
</div>
