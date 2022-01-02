<?php

use app\models\search\RussianWordSearch;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var RussianWordSearch $model
 * @var ActiveForm $form
 */
?>
<div class="buryat-word-search">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><?= Yii::t('app', 'Search') ?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($model, 'name') ?>

            <?= Html::submitButton(Yii::t('app', 'Find'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>