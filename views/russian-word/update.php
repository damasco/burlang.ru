<?php

use yii\bootstrap\Html;

/**
 * @var yii\web\View $this
 * @var app\models\RussianWord $model
 * @var app\models\RussianTranslation $translationForm
 */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Russian words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="russian-word-update">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/_alert') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= $this->render('_translation_form', [
        'model' => $model,
        'translationForm' => $translationForm,
    ]) ?>

</div>
