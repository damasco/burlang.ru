<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ruwords */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ruwords',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ruwords'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ruwords-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
