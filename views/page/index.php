<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var yii\web\View $this */
/* @var app\models\search\PageSearch $searchModel */
/* @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create page'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'link' => $model->link]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
