<?php

use app\models\BuryatName;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var BuryatName $model
 */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat names'), 'url' => ['admin']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="buryat-name-update">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
