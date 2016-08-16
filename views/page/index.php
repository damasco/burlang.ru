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
        <?= Html::a(Html::icon('plus') . ' ' . Yii::t('app', 'Create page'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    'class' => 'app\components\ActionColumn',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a(
                                Html::icon('eye-open'),
                                ['view', 'link' => $model->link],
                                ['class' => 'btn btn-sm btn-default']
                            );
                        }
                    ],
                    'contentOptions' => [
                        'class' => 'action-column-2',
                    ],
                ],
            ],
        ]); ?>
    </div>

</div>
