<?php

use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $russian_word mixed */
/* @var $buryat_word mixed */
/* @var $buryat_name mixed */

$this->title = Yii::$app->name . ' - ' . Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary');
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                <h4><?= Yii::t('app', 'Russian-Buryat dictionary') ?></h4>
                <hr>
                <form action="/site/russian-translate" method="get" id="russian-form">
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
                        <?= $this->render('_translate', ['word' => $russian_word]) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="well">
                <h2 class="panel-title"><?= Yii::t('app', 'Buryat-Russian dictionary') ?></h2>
                <hr>
                <form action="/site/buryat-translate" method="get" id="buryat-form">
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
                                <button type="button" class="btn btn-default add-buryat-word">ү</button>
                                <button type="button" class="btn btn-default add-buryat-word">һ</button>
                                <button type="button" class="btn btn-default add-buryat-word">ө</button>
                                <button type="submit" class="btn btn-custom"><?= Yii::t('app', 'Find') ?></button>
                            </span>
                        </div>
                    </div>
                </form>
                <div id="buryat-translation">
                    <?php if (isset($buryat_word)): ?>
                        <?= $this->render('_translate', ['word' => $buryat_word]) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="mt20">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title"><?= Yii::t('app', 'Buryat names') ?></h2>
                    </div>
                    <div class="panel-body">
                        <form action="/site/buryat-name" method="get" id="buryat-name-form">
                            <input type="hidden" name="<?=Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                            <div class="form-group">
                                <div class="input-group">
                                    <?= AutoComplete::widget([
                                        'name' => 'buryat_name',
                                        'value' => Yii::$app->request->get('buryat-name'),
                                        'options' => [
                                            'class' => 'form-control',
                                            'placeholder' => Yii::t('app', 'Enter the buryat name'),
                                            'required' => true,
                                        ],
                                        'clientOptions' => [
                                            'source' => '/site/get-buryat-names',
                                            'select' => new JsExpression('function (event, ui) {
                                                $.ajax({
                                                    url: \'/site/buryat-name\',
                                                    data: { buryat_name: ui.item.value }
                                                }).done(function(response) {
                                                    $(\'#buryat-name-response\').html(response);
                                                });
                                            }')
                                        ]
                                    ]) ?>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default add-bur-word">ү</button>
                                        <button type="button" class="btn btn-default add-bur-word">һ</button>
                                        <button type="button" class="btn btn-default add-bur-word">ө</button>
                                        <button type="submit" class="btn btn-custom"><?= Yii::t('app', 'Find') ?></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div id="buryat-name-response">
                            <?php if (isset($buryat_name)): ?>
                                <?= $this->render('_buryat_name', ['buryat_name' => $buryat_name]) ?>
                            <?php endif ?>
                        </div>
                        <p>
                            <?= \yii\helpers\Html::a(Yii::t('app', 'View the names in alphabetical order'),
                                ['buryat-name/list'], ['class' => 'btn btn-warning']) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt20">
                <?= $this->render('/_comments') ?>
            </div>
        </div>
        <div class="col-sm-4">
            <?= \app\widgets\NewsWidget::widget() ?>
        </div>
    </div>
</div>
