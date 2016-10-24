<?php

use yii\bootstrap\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\search\PageSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(
            Html::icon('plus') . ' ' . Yii::t('app', 'Create page'),
            ['create'],
            ['class' => 'btn btn-success']
        ) ?>
    </p>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'menu_name',
                'title',
                'link',
                'description',
                [
                    'attribute' => 'active',
                    'filter' => ['0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')],
                    'format' => 'boolean',
                ],
                [
                    'attribute' => 'static',
                    'filter' => ['0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')],
                    'format' => 'boolean',
                ],

                [
                    'class' => 'app\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a(
                                Html::icon('eye-open'),
                                ['view', 'link' => $model->link],
                                [
                                    'title' => Yii::t('yii', 'View'),
                                    'class' => 'btn btn-sm btn-default',
                                    'aria-label' => Yii::t('yii', 'View'),
                                    'data-pjax' => '0',
                                ]
                            );
                        },
                        'delete' => function($url, $model) {
                            if (!$model->static) {
                                return Html::a(
                                    Html::icon('trash'),
                                    $url,
                                    [
                                        'title' => Yii::t('yii', 'Delete'),
                                        'class' => 'btn btn-sm btn-danger',
                                        'aria-label' => Yii::t('yii', 'Delete'),
                                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                    ]
                                );
                            }
                        },
                    ],
                    'contentOptions' => [
                        'class' => 'action-column-3',
                    ],
                ],
            ],
        ]); ?>
    </div>

</div>
