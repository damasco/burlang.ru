<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dictionaries */

$this->title = Yii::t('app', 'Create Dictionaries');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionaries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
