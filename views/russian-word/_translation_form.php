<?php

use yii\widgets\ActiveForm;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\widgets\ChartsInputWidget;

/**
 * @var mixed $translationForm
 * @var \app\models\RussianWord $model
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><?= Yii::t('app', 'Translations') ?></h4>
    </div>
    <div class="panel-body">
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
                            'class' => 'action-column-1'
                        ]
                    ],
                ],
            ]); ?>
        </div>

        <div class="well">
            <h4><?= Yii::t('app', 'Add translation') ?></h4>
            <hr>
            <?php $form = ActiveForm::begin() ?>

            <?= $form->field($translationForm, 'name')->widget(
                ChartsInputWidget::className(), ['options' => ['maxlength' => true]]
            ) ?>

            <?= $form->field($translationForm, 'ruword_id')->hiddenInput(['value' => $model->id])->label(false) ?>

            <?= Html::submitButton(Html::icon('plus') . ' ' . Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>