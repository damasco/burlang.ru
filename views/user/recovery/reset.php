<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Reset your password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="well">
            <h4><?= Html::encode($this->title) ?></h4>
            <hr>
            <?php $form = ActiveForm::begin([
                'id'                     => 'password-recovery-form',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
            ]); ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= Html::submitButton(Yii::t('user', 'Finish'), ['class' => 'btn btn-custom btn-block']) ?><br>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
