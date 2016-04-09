<?php

/* @var $this yii\web\View */
/* @var $ruword mixed */
/* @var $burword mixed */

$this->title = Yii::$app->name . ' - ' . Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary');
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                <h3><?= Yii::t('app', 'Russian-Buryat dictionary') ?></h3>
                <hr>
                <form action="/site/ru2bur" method="get" id="ru-form">
                    <div class="form-group">
                        <div class="input-group">
                            <?= \yii\jui\AutoComplete::widget([
                                'name' => 'ruword',
                                'value' => Yii::$app->request->get('ruword'),
                                'options' => [
                                    'class' => 'form-control',
                                    'placeholder' => Yii::t('app', 'Add word'),
                                    'required' => true,
                                ],
                                'clientOptions' => [
                                    'source' => '/site/get-ruwords',
                                    'select' => new \yii\web\JsExpression('function (event, ui) {
                                    $.ajax({
                                        url: \'/site/ru2bur\',
                                        data: {ruword: ui.item.value},
                                        success: function(response) {
                                            $(\'#ru-translation\').html(response);
                                        }
                                    });
                                }')
                                ]
                            ]) ?>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Find') ?></button>
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
                <h3><?= Yii::t('app', 'Buryat-Russian dictionary') ?></h3>
                <hr>
                <form action="/site/bur2ru" method="get" id="bur-form">
                    <div class="form-group">
                        <div class="input-group">
                            <?= \yii\jui\AutoComplete::widget([
                                'name' => 'burword',
                                'value' => Yii::$app->request->get('burword'),
                                'options' => [
                                    'class' => 'form-control',
                                    'id' => 'bur-input',
                                    'placeholder' => Yii::t('app', 'Add word'),
                                    'required' => true
                                ],
                                'clientOptions' => [
                                    'source' => '/site/get-burwords',
                                    'select' => new \yii\web\JsExpression('function (event, ui) {
                                    $.ajax({
                                        url: \'/site/bur2ru\',
                                        data: {burword: ui.item.value},
                                        success: function(response) {
                                            $(\'#bur-translation\').html(response);
                                        }
                                    });
                                }')
                                ]
                            ]) ?>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default add-bur-word">ү</button>
                                <button type="button" class="btn btn-default add-bur-word">һ</button>
                                <button type="button" class="btn btn-default add-bur-word">ө</button>
                                <button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Find') ?></button>
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
        <div class="col-sm-4 col-sm-push-8">
            <?= \app\widgets\NewsWidget::widget() ?>
        </div>
        <div class="col-sm-8 col-sm-pull-4">
            <div class="comment-block">
                <?= $this->render('//_comments') ?>
            </div>
        </div>
    </div>
</div>
