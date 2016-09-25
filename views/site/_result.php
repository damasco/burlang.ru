<?php

/**
 * @var \app\models\BuryatWord|\app\models\RussianWord|boolean|null $word
 */
?>

<?php if ($word !== ''): ?>
    <?php if ($word === false): ?>
        <?= $this->render('_only_word') ?>
    <?php else: ?>
        <?= $this->render('_translation', ['word' => $word]) ?>
    <?php endif ?>
<?php endif ?>