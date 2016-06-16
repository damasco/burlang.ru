<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ijackua\lepture\Markdowneditor;

/* @var yii\web\View $this */
/* @var app\models\Book $model */
/* @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= Markdowneditor::widget([
        'model' => $model,
        'attribute' => 'content'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
