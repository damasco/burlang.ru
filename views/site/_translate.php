<?php

/* @var $word mixed */
?>

<?php if ($word && $word->getTranslation()->exists()): ?>
<ul>
    <?php foreach($word->translation as $item): ?>
        <li><?= $item['name'] ?></li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
    <?= Yii::t('app', 'No translation') ?>
<?php endif ?>
