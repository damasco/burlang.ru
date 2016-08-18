<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\ChartsInputWidget;

/**
 * @var yii\web\View $this
 * @var app\models\search\BuryatNameSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="buryat-word-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['admin'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <?= $form->field($model, 'name')->widget(ChartsInputWidget::className()) ?>
        </div>
        <div class="col-sm-6 col-md-4">
            <?= $form->field($model, 'description') ?>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-6 col-xs-6">
                    <?= $form->field($model, 'male')->dropDownList(['0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')], ['prompt' => '']) ?>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <?= $form->field($model, 'female')->dropDownList(['0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')], ['prompt' => '']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>