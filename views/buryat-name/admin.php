<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\search\BuryatNameSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Buryat names');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="buryat-name-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Html::icon('plus') . ' ' . Yii::t('app', 'Add name'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    'class' => 'app\components\ActionColumn',
                    'contentOptions' => [
                        'class' => 'action-column-3',
                    ],
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
