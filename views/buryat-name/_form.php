<?php

use app\models\BuryatName;
use app\widgets\InputCharts;
use app\widgets\TextareaCharts;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var BuryatName $model
 * @var ActiveForm $form
 */
?>
<div class="buryat-name-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->widget(InputCharts::class, ['options' => ['maxlength' => true]]) ?>
    <?= $form->field($model, 'description')->widget(InputCharts::class, ['options' => ['maxlength' => true]]) ?>
    <?= $form->field($model, 'note')->widget(TextareaCharts::class, ['options' => ['rows' => 5]]) ?>
    <?= $form->field($model, 'male')->checkbox() ?>
    <?= $form->field($model, 'female')->checkbox() ?>
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
