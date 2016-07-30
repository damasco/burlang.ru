<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\BookChapter $model
 * @var app\models\Book $book
 */

$this->title = Yii::t('app', 'Add chapter');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $book->title, 'url' => ['view', 'slug' => $book->slug]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
