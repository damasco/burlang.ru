<?php

use app\models\search\BuryatNameSearch;
use app\models\SearchData;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var View $this
 * @var BuryatNameSearch $searchModel
 * @var ActiveDataProvider $dataProvider
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
                        return $model->type === SearchData::TYPE_RUSSIAN ?
                            Yii::t('app', 'Buryat word') :
                            Yii::t('app', 'Russian word');
                    }
                ],
                'created_at:datetime',
            ],
        ]); ?>
    </div>
</div>
