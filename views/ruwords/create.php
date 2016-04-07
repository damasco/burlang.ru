<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ruwords */

$this->title = Yii::t('app', 'Create Ruwords');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ruwords'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruwords-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
