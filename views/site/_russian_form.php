<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

?>
<div class="well">
    <h4><?= Yii::t('app', 'Russian-Buryat dictionary') ?></h4>
    <hr>
    <?php $form = ActiveForm::begin([
        'action' => ['site/russian-translate'],
        'options' => ['id' => 'russian-form']
    ]) ?>
    <div class="form-group">
        <div class="input-group">
            <?= AutoComplete::widget([
                'name' => 'russian_word',
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => Yii::t('app', 'Enter the word'),
                    'required' => true
                ],
                'clientOptions' => [
                    'source' => Url::to(["/site/get-russian-words"]),
                    'select' => new JsExpression("function (event, ui) {
                        $.ajax({
                            url: '" . Url::to(['site/russian-translate']) .  "',
                            data: { russian_word: ui.item.value }
                        }).done(function(response) {
                            $('#russian-translation').html(response);
                        });
                    }")
                ]
            ]) ?>
            <span class="input-group-btn">
            <button type="submit" class="btn btn-custom">
                <?= Yii::$app->get('devicedetect')->isMobile() ? Html::icon('send') : Yii::t('app', 'Translate') ?>
            </button>
        </span>
        </div>
    </div>
    <?php ActiveForm::end() ?>
    <div id="russian-translation"></div>
</div>
