<?php

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\BuryatWord;
use app\models\search\BuryatWordSearch;
use app\widgets\Alert;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\ArrayHelper;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var BuryatWordSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var DeviceDetectInterface $deviceDetect
 */

$this->title = Yii::t('app', 'Buryat words');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buryat-word-index">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= Alert::widget() ?>
    <p>
        <?= Html::a(
            Html::icon('plus') . ' ' . Yii::t('app', 'Add word'),
            ['create'],
            ['class' => 'btn btn-success']
        ) ?>
    </p>
    <?= $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => [
                'maxButtonCount' => $deviceDetect->isDesktop() ? 10 : 5,
            ],
            'columns' => [
                ['class' => SerialColumn::class],
                'name',
                [
                    'label' => Yii::t('app', 'Translations'),
                    'value' => function ($model) {
                        /** @var BuryatWord $model */
                        return Html::ul(ArrayHelper::getColumn($model->translations, 'name'));
                    },
                    'format' => 'raw',
                    'visible' => $deviceDetect->isDesktop(),
                ],
                [
                    'class' => ActionColumn::class,
                    'template' => '{update} {delete}',
                    'contentOptions' => [
                        'class' => 'action-column-2',
                    ],
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>