<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'itemView' => '_view'
    ]); ?>
</div>
