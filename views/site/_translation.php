<?php
/**
 * @var array $translations
 */
?>
<?php if ($translations): ?>
    <div class="alert alert-success">
        <ul class="translate-list">
            <?php foreach ($translations as $translation): ?>
                <li><?= $translation ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <div class="alert alert-danger">
        <?= Yii::t('app', 'No translation') ?>
    </div>
<?php endif ?>