<?php

/* @var $buryat_name mixed */
?>

<?php if ($buryat_name): ?>
    <div class="alert alert-success">

        <p><strong><?= $buryat_name['description'] ?></strong></p>

        <?php if ($buryat_name['note']): ?>
            <p><?= $buryat_name['note'] ?></p>
        <?php endif ?>

        <?php if ($buryat_name['male']): ?>
            <span class="label label-default"><?= Yii::t('app', 'Male name') ?></span>
        <?php endif ?>

        <?php if ($buryat_name['female']): ?>
            <span class="label label-default"><?= Yii::t('app', 'Female name') ?></span>
        <?php endif ?>

    </div>
<?php else: ?>
    <div class="alert alert-danger">
        <?= Yii::t('app', 'Name not found') ?>
    </div>
<?php endif ?>
