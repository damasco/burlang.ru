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
    <h4>Русско-Бурятский словарь</h4>
    <hr>
    <?php $form = ActiveForm::begin([
        'action' => ['/v1/russian-word/translate'],
        'options' => ['id' => 'russian-form']
    ]) ?>
    <div class="form-group">
        <div class="input-group">
            <?= AutoComplete::widget([
                'name' => 'q',
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => 'Введите слово',
                    'required' => true
                ],
                'clientOptions' => [
                    'source' => new JsExpression("function (request, response) {
                         $.ajax({
                             url: '" . Url::to(['/v1/russian-word/search']) . "',
                             data: { q: request.term },
                             dataType: 'json',
                             success: response,
                             error: function () {
                                 response([]);
                             }
                         });
                    }"),
                ],
            ]) ?>
            <span class="input-group-btn">
            <button type="submit" class="btn btn-custom">
                <?= $deviceDetect->isMobile()
                    ? Html::icon('send')
                    : 'Перевести'
                ?>
            </button>
        </span>
        </div>
    </div>
    <?php ActiveForm::end() ?>
    <div id="russian-translation"></div>
</div>
