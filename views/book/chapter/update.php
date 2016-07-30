<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\BookChapter $model
 */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book->title, 'url' => ['view', 'slug' => $model->book->slug]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['chapter', 'slug' => $model->book->slug, 'slug_chapter' => $model->slug]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>

<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
