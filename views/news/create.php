<?php

use app\models\News;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var News $model
 */

$this->title = Yii::t('app', 'Create news');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
