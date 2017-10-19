<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\RussianWordSearch $searchModel
 */

$this->title = Yii::t('app', 'Russian words');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="russian-word-index">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= \app\widgets\Alert::widget() ?>

    <p>
        <?= Html::a(Html::icon('plus') . ' ' . Yii::t('app', 'Add word'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]) ?>

    <?php Pjax::begin(); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => [
                'maxButtonCount' => !Yii::$app->get('devicedetect')->isMobile() ? 10 : 5,
            ],
            'columns' => [
                ['class' => \yii\grid\SerialColumn::class],

                'name',
                [
                    'label' => Yii::t('app', 'Translations'),
                    'value' => function ($model) {
                        /** @var \app\models\RussianWord $model */
                        return Html::ul(ArrayHelper::getColumn($model->translations, 'name'));
                    },
                    'format' => 'raw',
                    'visible' => !Yii::$app->get('devicedetect')->isMobile() ? true : false,
                ],

                [
                    'class' => \app\grid\ActionColumn::class,
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
