<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ruwords */

$this->title = Yii::t('app', 'New word');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Russian words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruwords-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
