<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var app\models\search\BuryatWordSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Buryat words');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="buryat-word-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/_alert') ?>

    <p>
        <?= Html::a(Html::icon('plus') . ' ' . Yii::t('app', 'Add word'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => [
                'maxButtonCount' => !Yii::$app->devicedetect->isMobile() ? 10 : 5,
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                [
                    'label' => Yii::t('app', 'Translations'),
                    'value' => function ($model) {
                        /** @var \app\models\BuryatWord $model */
                        return Html::ul(ArrayHelper::getColumn($model->translations, 'name'));
                    },
                    'format' => 'raw',
                    'visible' => !Yii::$app->devicedetect->isMobile() ? true : false,
                ],

                [
                    'class' => 'app\components\ActionColumn',
                    'template' => '{update} {delete}',
                    'contentOptions' => [
                        'class' => 'action-column-2'
                    ]
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>