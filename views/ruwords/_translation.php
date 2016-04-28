<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $model mixed */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><?= Yii::t('app', 'Translate') ?></h4>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => (new ActiveDataProvider([
                'query' => $model->getTranslation()
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