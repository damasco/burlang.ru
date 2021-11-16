<?php

use app\widgets\InputCharts;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\BuryatWord $model
 * @var array $dictionaries
 */

?>
<div class="buryat-word-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(InputCharts::class, ['options' => ['maxlength' => true]]) ?>

    <?= $form->field($model, 'dict_id')->dropDownList($dictionaries, ['prompt' => '-']) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ?
                Html::icon('plus') . ' ' . Yii::t('app', 'Add') :
                Html::icon('floppy-disk') . ' ' . Yii::t('app', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>

        <?php if (!$model->isNewRecord): ?>
            <?= Html::a(Html::icon('trash') . ' ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete?'),
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
