<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\InputChartsWidget;
use app\widgets\TextareaChartsWidget;

/* @var yii\web\View $this */
/* @var app\models\BuryatName $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="buryat-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(InputChartsWidget::className(), ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'description')->widget(InputChartsWidget::className(), ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'note')->widget(TextareaChartsWidget::className(), ['options' => ['rows' => 5]]) ?>

    <?= $form->field($model, 'male')->checkbox() ?>

    <?= $form->field($model, 'female')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
