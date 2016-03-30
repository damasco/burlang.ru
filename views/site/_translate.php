<?php

/* @var $word mixed */
?>

<?php if ($word && $word->getTranslation()->exists()): ?>
<div class="alert alert-success">
    <ul class="translate-list">
        <?php foreach($word->translation as $item): ?>
            <li><?= $item['name'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php else: ?>
    <div class="alert alert-danger">
        <?= Yii::t('app', 'No translation') ?>
    </div>
<?php endif ?>
