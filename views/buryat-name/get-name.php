<?php

/* @var $this yii\web\View */
/* @var $model app\models\BuryatName */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat names'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h3><?= $this->title ?></h3>

<?= $this->render('_description_name', ['model' => $model]) ?>
