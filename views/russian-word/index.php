<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var yii\web\View $this */
/* @var app\models\RussianWordSearch $searchModel */
/* @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Russian words');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="russian-word-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add word'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                [
                    'label' => Yii::t('app', 'Translation'),
                    'value' => function ($model) {
                        return Html::ul(ArrayHelper::getColumn($model->translation, 'name'));
                    },
                    'format' => 'raw'
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'contentOptions' => [
                        'style' => 'width: 50px;'
                    ]
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
