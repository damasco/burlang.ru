<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\RussianWordSearch $searchModel
 */

$this->title = Yii::t('app', 'Russian words');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="russian-word-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Html::icon('plus') . ' ' . Yii::t('app', 'Add word'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    'label' => Yii::t('app', 'Translations'),
                    'value' => function ($model) {
                        /** @var \app\models\RussianWord $model */
                        return Html::ul(ArrayHelper::getColumn($model->translations, 'name'));
                    },
                    'format' => 'raw'
                ],

                [
                    'class' => 'app\components\ActionColumn',
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
