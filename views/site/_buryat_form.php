<?php

use app\components\DeviceDetect\DeviceDetectInterface;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/**
 * @var DeviceDetectInterface $deviceDetect
 */
?>
<div class="well">
    <h4><?= Yii::t('app', 'Buryat-Russian dictionary') ?></h4>
    <hr>
    <?php $form = ActiveForm::begin([
        'action' => ['site/buryat-translate'],
        'options' => ['id' => 'buryat-form']
    ]) ?>
    <div class="form-group">
        <div class="input-group">
            <?= AutoComplete::widget([
                'name' => 'buryat_word',
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => Yii::t('app', 'Enter the word'),
                    'required' => true
                ],
                'clientOptions' => [
                    'source' => Url::to(['/site/get-buryat-words']),
                    'select' => new JsExpression("function (event, ui) {
                        $.ajax({
                            url: '" . Url::to(['/site/buryat-translate']) . "',
                            data: { buryat_word: ui.item.value }
                        }).done(function(response) {
                            $('#buryat-translation').html(response);
                        });
                    }")
                ]
            ]) ?>
            <span class="input-group-btn">
            <button type="button" class="btn btn-default add-input-letter">ү</button>
            <button type="button" class="btn btn-default add-input-letter">һ</button>
            <button type="button" class="btn btn-default add-input-letter">ө</button>
            <button type="submit" class="btn btn-custom">
                <?= $deviceDetect->isMobile()
                    ? Html::icon('send')
                    : Yii::t('app', 'Translate')
                ?>
            </button>
        </span>
        </div>
    </div>
    <?php ActiveForm::end() ?>
    <div id="buryat-translation"></div>
</div>
