<?php

/* @var $this yii\web\View */
/* @var $rusword mixed */
/* @var $burword mixed */

$this->title = Yii::$app->name . ' - ' . Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary');
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                <h3><?= Yii::t('app', 'Russian-Buryat dictionary') ?></h3>
                <hr>
                <form action="/site/rus2bur" method="get" id="rus-form">
                    <div class="form-group">
                        <div class="input-group">
                            <?= \yii\jui\AutoComplete::widget([
                                'name' => 'rusword',
                                'value' => Yii::$app->request->get('rusword'),
                                'options' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'Введите слово',
                                    'required' => true,
                                ],
                                'clientOptions' => [
                                    'source' => '/site/get-ruswords',
                                    'select' => new \yii\web\JsExpression('function (event, ui) {
                                    $.ajax({
                                        url: \'/site/rus2bur\',
                                        data: {rusword: ui.item.value},
                                        success: function(response) {
                                            $(\'#rus-translation\').html(response);
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
                <div id="rus-translation">
                    <?php if (isset($rusword)): ?>
                        <?= $this->render('_translate', ['word' => $rusword]) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="well">
                <h3><?= Yii::t('app', 'Buryat-Russian dictionary') ?></h3>
                <hr>
                <form action="/site/bur2rus" method="get" id="bur-form">
                    <div class="form-group">
                        <div class="input-group">
                            <?= \yii\jui\AutoComplete::widget([
                                'name' => 'burword',
                                'value' => Yii::$app->request->get('burword'),
                                'options' => [
                                    'class' => 'form-control',
                                    'id' => 'bur-input',
                                    'placeholder' => 'Введите слово',
                                    'required' => true
                                ],
                                'clientOptions' => [
                                    'source' => '/site/get-burwords',
                                    'select' => new \yii\web\JsExpression('function (event, ui) {
                                    $.ajax({
                                        url: \'/site/bur2rus\',
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
    <br/>
    <div class="row">
        <div class="col-sm-6">
            <h3>News</h3>
            <div style="margin-bottom: 15px;">
                <h4><a href="">Lorem ipsum</a></h4>
                <p class="text-danger">21.03.2016</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eaque ipsam laboriosam? Ad architecto beatae, eius est explicabo fugiat molestias natus, numquam omnis ratione sed ullam. Corporis dolor quas voluptatum.</p>
                <a href="">Read</a>
            </div>
            <div style="margin-bottom: 15px;">
                <h4><a href="">Lorem ipsum</a></h4>
                <p class="text-danger">21.03.2016</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eaque ipsam laboriosam? Ad architecto beatae, eius est explicabo fugiat molestias natus, numquam omnis ratione sed ullam. Corporis dolor quas voluptatum.</p>
                <a href="">Read</a>
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Comments:</h3>
        </div>
    </div>
</div>
