<?php

/* @var $buryat_name \app\models\BuryatName */
?>

<?php if ($buryat_name): ?>
    <?= $this->render('/buryat-name/_description_name', ['model' => $buryat_name]) ?>
<?php else: ?>
    <div class="alert alert-danger">
        <?= Yii::t('app', 'Name not found') ?>
    </div>
<?php endif ?>
