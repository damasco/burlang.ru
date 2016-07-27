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
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module $module
 * @var dektrium\user\models\RegistrationForm $model
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="well">
            <h4><?= Html::encode($this->title) ?></h4>
            <hr>
            <?php $form = ActiveForm::begin([
                'id'                     => 'registration-form',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
            ]); ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'username') ?>

            <?php if ($module->enableGeneratingPassword == false): ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
            <?php endif ?>

            <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-custom btn-block']) ?>

            <?php ActiveForm::end(); ?>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
    </div>
</div>
