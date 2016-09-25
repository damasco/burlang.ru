<?php

use yii\jui\AutoComplete;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;
?>

<?php $form = ActiveForm::begin([
    'action' => Url::to(['/site/buryat-translate']),
    'method' => 'get',
    'options' => [
        'id' => 'buryat-form',
    ]
]) ?>
<div class="form-group">
    <div class="input-group">
        <?= AutoComplete::widget([
            'name' => 'buryat_word',
            'value' => Yii::$app->request->get('buryat_word'),
            'options' => [
                'class' => 'form-control',
                'placeholder' => Yii::t('app', 'Enter the word'),
                'required' => true
            ],
            'clientOptions' => [
                'source' => '/site/get-buryat-words',
                'select' => new JsExpression("function (event, ui) {
                                        $.ajax({
                                            url: '/site/buryat-translate',
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
            <button type="submit" class="btn btn-custom"><?= Yii::t('app', 'Find') ?></button>
        </span>
    </div>
</div>
<?php ActiveForm::end() ?>
