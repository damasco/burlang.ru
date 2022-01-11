<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Book $model
 */

$this->title = 'Редактировать: ' .$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'slug' => $model->slug]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
