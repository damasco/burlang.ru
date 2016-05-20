<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BuryatNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buryat names');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buryat-name-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add name'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    'description',
                    'note:ntext',
                    [
                        'attribute' => 'male',
                        'format' => 'boolean',
                        'filter' => ['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')]
                    ],
                    [
                        'attribute' => 'female',
                        'format' => 'boolean',
                        'filter' => ['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')]
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => [
                            'style' => 'width: 70px;'
                        ]
                    ],
                ],
            ]); ?>
        </div>
    <?php Pjax::end(); ?>
</div>
