<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuryatName */

$this->title = Yii::t('app', 'Create Buryat Name');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buryat-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
