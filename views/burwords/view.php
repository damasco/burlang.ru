<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Burwords */
/* @var $translateForm app\models\Rutranslations */
/* @var $dictionaries app\models\Dictionaries[] */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="burwords-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><?= Yii::t('app', 'Translate') ?></h4>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => (new \yii\data\ActiveDataProvider([
                    'query' => $model->getTranslation()
                ])),
                'showHeader' => false,
                'summary' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                    ['delete-translate', 'id' => $model->id],
                                    [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data' => [
                                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ]
                                    ]);
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title"><?= Yii::t('app', 'Add translation') ?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin() ?>

            <?= $form->field($translateForm, 'name')->textInput() ?>

            <?= $form->field($translateForm, 'burword_id')->hiddenInput(['value' => $model->id])->label(false) ?>

            <?= $form->field($translateForm, 'dict_id')
                ->dropDownList(ArrayHelper::map($dictionaries, 'id', 'name'), ['prompt' => '-']) ?>

            <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end() ?>
        </div>
    </div>

</div>
