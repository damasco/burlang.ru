<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Burwords */

$this->title = Yii::t('app', 'Update') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="burwords-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
