<?php

use app\models\News;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var News $model
 */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'slug' => $model->slug]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="news-update">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
