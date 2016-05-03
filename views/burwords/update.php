<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Burwords */
/* @var $translationForm app\models\Rutranslations */
/* @var $dictionaries app\models\Dictionaries[] */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="burwords-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/_alert') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= $this->render('_translation_form', [
        'model' => $model,
        'translationForm' => $translationForm,
        'dictionaries' => $dictionaries
    ]) ?>

    <?= Html::a(Yii::t('app', 'Delete word'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>

</div>
