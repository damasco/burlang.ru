<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Burwords */

$this->title = Yii::t('app', 'Create Burwords');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Burwords'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="burwords-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>