<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Dictionary $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dictionary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Html::icon('pencil') . ' ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Html::icon('trash') . ' ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'info',
                'isbn',
            ],
        ]) ?>
    </div>

</div>
