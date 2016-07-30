<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Book $model
 */

$this->title = Yii::t('app', 'Create book');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
