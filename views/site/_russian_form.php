<?php

use yii\jui\AutoComplete;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap\Html;

?>

<?php $form = ActiveForm::begin([
    'action' => Url::to(['/site/russian-translate']),
    'method' => 'get',
    'options' => [
        'id' => 'russian-form',
    ]
]) ?>
<div class="form-group">
    <div class="input-group">
        <?= AutoComplete::widget([
            'name' => 'russian_word',
            'value' => Yii::$app->request->get('russian_word'),
            'options' => [
                'class' => 'form-control',
                'placeholder' => Yii::t('app', 'Enter the word'),
                'required' => true
            ],
            'clientOptions' => [
                'source' => '/site/get-russian-words',
                'select' => new JsExpression("function (event, ui) {
                    $.ajax({
                        url: '/site/russian-translate',
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
