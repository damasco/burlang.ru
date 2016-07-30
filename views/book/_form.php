<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ijackua\lepture\Markdowneditor;
use app\widgets\TextareaChartsWidget;
use app\widgets\ChartsInputWidget;

/* @var yii\web\View $this */
/* @var app\models\Book $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'title')->widget(ChartsInputWidget::className(), ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'description')->widget(TextareaChartsWidget::className(), ['options' => ['rows' => 5]]) ?>

    <?= $form->field($model, 'content')->widget(Markdowneditor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
