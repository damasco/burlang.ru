<?php

/* @var $burname mixed */
?>

<?php if ($burname): ?>
    <div class="alert alert-success">
        <p><strong><?= $burname['description'] ?></strong></p>
        <?php if ($burname['note']): ?>
            <p><?= $burname['note'] ?></p>
        <?php endif ?>
        <?php if ($burname['male']): ?>
            <span class="label label-default"><?= Yii::t('app', 'Male name') ?></span>
        <?php endif ?>
        <?php if ($burname['female']): ?>
            <span class="label label-default"><?= Yii::t('app', 'Female name') ?></span>
        <?php endif ?>
    </div>
<?php else: ?>
    <div class="alert alert-danger">
        <?= Yii::t('app', 'Name not found') ?>
    </div>
<?php endif ?>