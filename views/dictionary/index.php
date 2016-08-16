<?php

use yii\bootstrap\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Dictionaries');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(
            Html::icon('plus') . ' ' . Yii::t('app', 'Add dictionary'),
            ['create'],
            ['class' => 'btn btn-success']
        ) ?>
    </p>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'info',
                'isbn',

                [
                    'class' => 'app\components\ActionColumn',
                    'contentOptions' => [
                        'class' => 'action-column-3'
                    ]
                ],
            ],
        ]); ?>
    </div>

</div>
