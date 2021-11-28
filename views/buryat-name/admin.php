<?php

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\search\BuryatNameSearch;
use app\widgets\Alert;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var BuryatNameSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var DeviceDetectInterface $deviceDetect
 */

$this->title = Yii::t('app', 'Buryat names');
$this->params['breadcrumbs'][] = $this->title;

$isDesktop = $deviceDetect->isDesktop();
?>
<div class="buryat-name-index">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= Alert::widget() ?>
    <p>
        <?= Html::a(Html::icon('plus') . ' ' . Yii::t('app', 'Add name'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= $this->render('_search', ['model' => $searchModel]) ?>
    <?php Pjax::begin(); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => [
                'maxButtonCount' => $isDesktop ? 10 : 5,
            ],
            'columns' => [
                ['class' => SerialColumn::class],
                'name',
                [
                    'attribute' => 'description',
                    'visible' => $isDesktop,
                ],
                [
                    'attribute' => 'male',
                    'format' => 'boolean',
                    'filter' => ['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')],
                    'visible' => $isDesktop,
                ],
                [
                    'attribute' => 'female',
                    'format' => 'boolean',
                    'filter' => ['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')],
                    'visible' => $isDesktop,
                ],
                [
                    'class' => ActionColumn::class,
                    'contentOptions' => [
                        'class' => 'action-column-3',
                    ],
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
