<?php
/**
 * @var array|boolean|null $translations
 */
?>
<?php if (is_array($translations) && !empty($translations)): ?>
    <div class="alert alert-success">
        <ul class="translate-list">
            <?php foreach ($translations as $translation): ?>
                <li><?= $translation['name'] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php elseif ($translations === false): ?>
    <div class="alert alert-info">
        <?= Yii::t('app', 'You can translate only one word') ?>
    </div>
<?php else: ?>
    <div class="alert alert-danger">
        <?= Yii::t('app', 'No translation') ?>
    </div>
<?php endif ?>