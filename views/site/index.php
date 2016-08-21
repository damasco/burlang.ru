<?php

use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\widgets\NewsWidget;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var mixed $russian_word
 * @var mixed $buryat_word
 * @var mixed $buryat_name
 */

$this->title = Yii::$app->name . ' - ' . Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary');
?>

<div class="site-index">
    <div class="row mt-10">
        <div class="col-sm-6">
            <div class="well">
                <h4><?= Yii::t('app', 'Russian-Buryat dictionary') ?></h4>
                <hr>
                <form action="<?= Url::to(['site/russian-translate']) ?>" method="get" id="russian-form">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <div class="form-group">
                        <div class="input-group">
                            <?= AutoComplete::widget([
                                'name' => 'russian_word',
                                'value' => Yii::$app->request->get('russian_word'),
                                'options' => [
                                    'class' => 'form-control',
                                    'placeholder' => Yii::t('app', 'Enter the word'),
                                    'required' => true,
                                ],
                                'clientOptions' => [
                                    'source' => '/site/get-russian-words',
                                    'select' => new JsExpression('function (event, ui) {
                                        $.ajax({
                                            url: \'/site/russian-translate\',
                                            data: { russian_word: ui.item.value }
                                        }).done(function(response) {
                                            $(\'#russian-translation\').html(response);
                                        });
                                    }')
                                ]
                            ]) ?>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-custom"><?= Yii::t('app', 'Find') ?></button>
                            </span>
                        </div>
                    </div>
                </form>
                <div id="russian-translation">
                    <?php if (isset($russian_word)): ?>
                        <?= $this->render('_translation', ['word' => $russian_word]) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="well">
                <h4><?= Yii::t('app', 'Buryat-Russian dictionary') ?></h4>
                <hr>
                <form action="<?= Url::to(['site/buryat-translate']) ?>" method="get" id="buryat-form">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
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
                                    'select' => new JsExpression('function (event, ui) {
                                        $.ajax({
                                            url: \'/site/buryat-translate\',
                                            data: { buryat_word: ui.item.value }
                                        }).done(function(response) {
                                            $(\'#buryat-translation\').html(response);
                                        });
                                    }')
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
                </form>
                <div id="buryat-translation">
                    <?php if (isset($buryat_word)): ?>
                        <?= $this->render('_translation', ['word' => $buryat_word]) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-10">
        <div class="col-sm-4 col-sm-push-8">
            <?= NewsWidget::widget() ?>
        </div>
        <div class="col-sm-8 col-sm-pull-4">
            <?= $this->render('/_comments') ?>
        </div>
    </div>
</div>
