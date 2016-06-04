<?php

use yii\helpers\Html;


/* @var yii\web\View $this */
/* @var app\models\Dictionary $model */

$this->title = Yii::t('app', 'Add dictionary');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dictionary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
