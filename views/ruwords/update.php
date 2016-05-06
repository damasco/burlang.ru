<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ruwords */
/* @var $translationForm app\models\Burtranslations */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Russian words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruwords-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/_alert') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= $this->render('_translation_form', [
        'model' => $model,
        'translationForm' => $translationForm,
    ]) ?>

    <?= Html::a(Yii::t('app', 'Delete word'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>

</div>
