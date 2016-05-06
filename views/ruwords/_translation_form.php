<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $translationForm mixed */
/* @var $model \app\models\Ruwords */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><?= Yii::t('app', 'Translation') ?></h4>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => (new ActiveDataProvider([
                'query' => $model->getTranslation(),
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
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                ['delete-translation', 'id' => $model->id],
                                [
                                    'title' => Yii::t('app', 'Delete translation'),
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

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($translationForm, 'name', ['template' => '
            {label}
            <div class="input-group">
                {input}
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default add-bur-word">ү</button>
                    <button type="button" class="btn btn-default add-bur-word">һ</button>
                    <button type="button" class="btn btn-default add-bur-word">ө</button>
                </span>
            </div>
            {error}{hint}
        '])->textInput() ?>

        <?= $form->field($translationForm, 'ruword_id')->hiddenInput(['value' => $model->id])->label(false) ?>

        <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>