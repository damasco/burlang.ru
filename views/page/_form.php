<?php

use app\assets\MarkdownEditorAsset;
use app\widgets\InputCharts;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Page $model
 * @var yii\widgets\ActiveForm $form
 */

MarkdownEditorAsset::register($this);
?>
<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'menu_name')->widget(InputCharts::class, ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'title')->widget(InputCharts::class, ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'link')->textInput(
        ['maxlength' => true, 'disabled' => $model->isNewRecord ? false : true]
    ) ?>

    <?= $form->field($model, 'description')->widget(InputCharts::class, ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'content')->textarea(['id' => 'markdown-editor']) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord 
                ? Html::icon('plus') . ' ' . Yii::t('app', 'Create')
                : Html::icon('floppy-disk') . ' ' . Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
