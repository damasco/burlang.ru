<?php

use app\assets\MarkdownEditorAsset;
use app\models\News;
use app\widgets\InputWithBuryatLetters;
use app\widgets\TextareaCharts;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var News $model
 * @var ActiveForm $form
 */

MarkdownEditorAsset::register($this);
?>
<div class="news-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <?= $form->field($model, 'active')->checkbox() ?>
    <?= $form->field($model, 'title')->widget(
        InputWithBuryatLetters::class,
        ['options' => ['maxlength' => true]]
    ) ?>
    <?= $form->field($model, 'description')->widget(
        TextareaCharts::class,
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
