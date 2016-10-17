<?php

/**
 * @var \app\models\BuryatWord|\app\models\RussianWord|null $word
 */

?>

<?php if ($word instanceof \yii\db\ActiveRecord && $word->getTranslations()->exists()): ?>

    <div class="alert alert-success">

        <ul class="translate-list">
            <?php foreach ($word->translations as $item): ?>
                <li><?= $item->name ?></li>
            <?php endforeach; ?>
        </ul>

    </div>

<?php else: ?>
    <div class="alert alert-danger">
        <?= Yii::t('app', 'No translation') ?>
    </div>
<?php endif ?>
