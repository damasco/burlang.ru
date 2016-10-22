<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use app\widgets\InputCharts;

/**
 * @var yii\web\View $this
 * @var app\models\BuryatName $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="buryat-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(InputCharts::className(), ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'description')->widget(InputCharts::className(), ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'note')->widget(\app\widgets\TextareaCharts::className(), ['options' => ['rows' => 5]]) ?>

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
