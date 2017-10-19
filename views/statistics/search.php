<?php

use app\models\SearchData;
use yii\bootstrap\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\search\BuryatNameSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Statistics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-search">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_menu') ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                [
                    'attribute' => 'type',
                    'value' => function ($model) {
                        return $model->type === SearchData::RUSSIAN_WORD_TYPE ?
                            Yii::t('app', 'Buryat word') :
                            Yii::t('app', 'Russian word');
                    }
                ],
                'created_at:datetime',
            ],
        ]); ?>
    </div>
</div>
