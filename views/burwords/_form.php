<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Burwords */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="burwords-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name', ['template' => '
        {label}
        <div class="input-group">
            {input}
            <span class="input-group-btn">
                <button type="button" class="btn btn-default add-bur-word">ү</button>
                <button type="button" class="btn btn-default add-bur-word">һ</button>
                <button type="button" class="btn btn-default add-bur-word">ө</button>
            </span>
        </div>
        {error}{hint}
    '])->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
