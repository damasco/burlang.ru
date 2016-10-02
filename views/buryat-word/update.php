<?php

use yii\bootstrap\Html;
use app\widgets\AlertWidget;

/**
 * @var yii\web\View $this
 * @var app\models\BuryatWord $model
 * @var app\models\BuryatTranslation $translationForm
 * @var app\models\Dictionary[] $dictionaries
 */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="buryat-word-update">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= AlertWidget::widget() ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= $this->render('_translation_form', [
        'model' => $model,
        'translationForm' => $translationForm,
        'dictionaries' => $dictionaries
    ]) ?>

</div>
