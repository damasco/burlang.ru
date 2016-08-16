<?php

use yii\bootstrap\Html;
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
        <?= Html::submitButton(
            $model->isNewRecord ?
                Html::icon('plus') . ' ' . Yii::t('app', 'Add') :
                Html::icon('floppy-disk') . ' ' . Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
