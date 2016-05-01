<?php

use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $ruword mixed */
/* @var $burword mixed */
/* @var $burname mixed */

$this->title = Yii::$app->name . ' - ' . Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary');
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                <h4><?= Yii::t('app', 'Russian-Buryat dictionary') ?></h4>
                <hr>
                <form action="/site/ru2bur" method="get" id="ru-form">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <div class="form-group">
                        <div class="input-group">
                            <?= AutoComplete::widget([
                                'name' => 'ruword',
                                'value' => Yii::$app->request->get('ruword'),
                                'options' => [
                                    'class' => 'form-control',
                                    'placeholder' => Yii::t('app', 'Enter the word'),
                                    'required' => true,
                                ],
                                'clientOptions' => [
                                    'source' => '/site/get-ruwords',
                                    'select' => new \yii\web\JsExpression('function (event, ui) {
                                        $.ajax({
                                            url: \'/site/ru2bur\',
                                            data: {ruword: ui.item.value}
                                        }).done(function(response) {
                                            $(\'#ru-translation\').html(response);
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
                <div id="ru-translation">
                    <?php if (isset($ruword)): ?>
                        <?= $this->render('_translate', ['word' => $ruword]) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="well">
                <h2 class="panel-title"><?= Yii::t('app', 'Buryat-Russian dictionary') ?></h2>
                <hr>
                <form action="/site/bur2ru" method="get" id="bur-form">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <div class="form-group">
                        <div class="input-group">
                            <?= AutoComplete::widget([
                                'name' => 'burword',
                                'value' => Yii::$app->request->get('burword'),
                                'options' => [
                                    'class' => 'form-control',
                                    'placeholder' => Yii::t('app', 'Enter the word'),
                                    'required' => true
                                ],
                                'clientOptions' => [
                                    'source' => '/site/get-burwords',
                                    'select' => new \yii\web\JsExpression('function (event, ui) {
                                        $.ajax({
                                            url: \'/site/bur2ru\',
                                            data: {burword: ui.item.value}
                                        }).done(function(response) {
                                            $(\'#bur-translation\').html(response);
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
                <div id="bur-translation">
                    <?php if (isset($burword)): ?>
                        <?= $this->render('_translate', ['word' => $burword]) ?>
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
                        <form action="/site/burname" method="get" id="burname-form">
                            <input type="hidden" name="<?=Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                            <div class="form-group">
                                <div class="input-group">
                                    <?= AutoComplete::widget([
                                        'name' => 'burname',
                                        'value' => Yii::$app->request->get('burname'),
                                        'options' => [
                                            'class' => 'form-control',
                                            'placeholder' => Yii::t('app', 'Enter the buryat name'),
                                            'required' => true,
                                        ],
                                        'clientOptions' => [
                                            'source' => '/site/get-burnames',
                                            'select' => new \yii\web\JsExpression('function (event, ui) {
                                                $.ajax({
                                                    url: \'/site/burname\',
                                                    data: {burname: ui.item.value}
                                                }).done(function(response) {
                                                    $(\'#burname-response\').html(response);
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
                        <div id="burname-response">
                            <?php if (isset($burname)): ?>
                                <?= $this->render('_burname', ['word' => $burname]) ?>
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
                <?= $this->render('//_comments') ?>
            </div>
        </div>
        <div class="col-sm-4">
            <?= \app\widgets\NewsWidget::widget() ?>
        </div>
    </div>
</div>
