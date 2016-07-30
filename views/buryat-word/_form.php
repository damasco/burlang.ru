<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\ChartsInputWidget;

/**
 * @var yii\web\View $this
 * @var app\models\BuryatWord $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="buryat-word-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(ChartsInputWidget::className(), ['options' => ['maxlength' => true]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
