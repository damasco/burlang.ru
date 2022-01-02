<?php

use app\models\Page;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var Page $model
 */

$this->title = Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'link' => $model->link]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
