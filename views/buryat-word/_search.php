<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\ChartsInputWidget;

/**
 * @var yii\web\View $this
 * @var app\models\search\BuryatWordSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="buryat-word-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name')->widget(ChartsInputWidget::className()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>