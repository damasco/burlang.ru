<?php

/**
 * @var \app\models\News $model
 */
?>

<div class="news-widget">

    <h3><?= Yii::t('app', 'News') ?></h3>

    <?php foreach ($model as $news): ?>
        <?= $this->render('/news/_view', ['model' => $news]) ?>
    <?php endforeach ?>

</div>