<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var yii\web\View $this */
/* @var app\models\BuryatName $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="buryat-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name', ['template' => '
        {label}
        <div class="input-group">
            {input}
            <span class="input-group-btn">
                <button type="button" class="btn btn-default add-buryat-word">ү</button>
                <button type="button" class="btn btn-default add-buryat-word">һ</button>
                <button type="button" class="btn btn-default add-buryat-word">ө</button>
            </span>
        </div>
        {error}{hint}
    '])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'male')->checkbox() ?>

    <?= $form->field($model, 'female')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
