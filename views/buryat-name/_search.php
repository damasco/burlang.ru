<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\BuryatNameSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="buryat-word-search">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><?= Yii::t('app', 'Search') ?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['admin'],
                'method' => 'get',
            ]); ?>

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <?= $form->field($model, 'name')->widget(\app\widgets\InputCharts::className()) ?>
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

            <?= Html::submitButton(Yii::t('app', 'Find'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>