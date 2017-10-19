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

$isMobile = Yii::$app->get('devicedetect')->isMobile();
?>
<div class="buryat-name-index">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= \app\widgets\Alert::widget() ?>

    <p>
        <?= Html::a(Html::icon('plus') . ' ' . Yii::t('app', 'Add name'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]) ?>

    <?php Pjax::begin(); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => [
                'maxButtonCount' => !$isMobile ? 10 : 5,
            ],
            'columns' => [
                ['class' => \yii\grid\SerialColumn::class],

                'name',
                [
                    'attribute' => 'description',
                    'visible' => !$isMobile ? true : false,
                ],
                [
                    'attribute' => 'male',
                    'format' => 'boolean',
                    'filter' => ['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')],
                    'visible' => !$isMobile ? true : false,
                ],
                [
                    'attribute' => 'female',
                    'format' => 'boolean',
                    'filter' => ['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')],
                    'visible' => !$isMobile ? true : false,
                ],
                [
                    'class' => \yii\grid\ActionColumn::class,
                    'contentOptions' => [
                        'class' => 'action-column-3',
                    ],
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
