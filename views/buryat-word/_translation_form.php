<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/**
 * @var mixed $translationForm
 * @var \app\models\Dictionary[] $dictionaries
 * @var \app\models\BuryatWord $model
 */
?>

<hr>

<h4><?= Yii::t('app', 'Translations') ?></h4>

<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => (new ActiveDataProvider([
            'query' => $model->getTranslations(),
            'pagination' => false
        ])),
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'dict_id',
                'value' => 'dictionary.name',
                'visible' => !Yii::$app->devicedetect->isMobile() ? true : false,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a(
                            Html::icon('trash'),
                            ['delete-translation', 'id' => $model->id],
                            [
                                'title' => Yii::t('app', 'Delete translation'),
                                'class' => 'btn btn-sm btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ]
                            ]
                        );
                    }
                ],
                'contentOptions' => [
                    'class' => 'action-column-1',
                ]
            ],
        ],
    ]); ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><?= Yii::t('app', 'Add translation') ?></h4>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin() ?>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($translationForm, 'name')->widget(\app\widgets\InputCharts::className()) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($translationForm, 'dict_id')->dropDownList(
                    ArrayHelper::map($dictionaries, 'id', 'name'), ['prompt' => '-']
                ) ?>
            </div>
        </div>

        <?= $form->field($translationForm, 'burword_id')->hiddenInput(['value' => $model->id])->label(false) ?>

        <?= Html::submitButton(Html::icon('plus') . ' ' . Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>