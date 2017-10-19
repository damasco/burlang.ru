<?php

use app\assets\MarkdownEditorAsset;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\News $model
 * @var yii\widgets\ActiveForm $form
 */

MarkdownEditorAsset::register($this);

?>
<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'title')->widget(
        \app\widgets\InputCharts::class,
    ['options' => ['maxlength' => true]]
    ) ?>

    <?= $form->field($model, 'description')->widget(
        \app\widgets\TextareaCharts::class,
        ['options' => ['rows' => 5]]
    ) ?>
    
    <?= $form->field($model, 'content')->textarea(['id' => 'markdown-editor']) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord 
                ? Html::icon('plus') . ' ' . Yii::t('app', 'Add') 
                : Html::icon('floppy-disk') . ' ' . Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
