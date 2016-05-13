<?php

use yii\helpers\Html;

?>
<div class="site-translation-service bg-warning text-center">
    <h4>Услуги по переводу</h4>
    <p class="text-muted">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    </p>
    <?= Html::a(Yii::t('app', 'More'), ['translation-service/index'], ['class' => 'btn btn-success btn-sm']) ?>
</div>