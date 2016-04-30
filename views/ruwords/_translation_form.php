<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $translationForm mixed */
/* @var $dictionaries \app\models\Dictionaries[] */
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h4 class="panel-title"><?= Yii::t('app', 'Add translation') ?></h4>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($translationForm, 'name', ['template' => '
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
        '])->textInput() ?>

        <?= $form->field($translationForm, 'ruword_id')->hiddenInput(['value' => $model->id])->label(false) ?>

        <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>