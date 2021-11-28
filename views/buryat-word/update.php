<?php

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\BuryatTranslation;
use app\models\BuryatWord;
use app\widgets\Alert;
use yii\bootstrap\Html;
use yii\web\View;

/**
 * @var View $this
 * @var BuryatWord $model
 * @var BuryatTranslation $translationForm
 * @var array $dictionaries
 * @var DeviceDetectInterface $deviceDetect
 */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buryat-word-update">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= Alert::widget() ?>
    <?= $this->render('_form', [
        'model' => $model,
        'dictionaries' => $dictionaries,
    ]) ?>
    <?= $this->render('_translation_form', [
        'model' => $model,
        'translationForm' => $translationForm,
        'dictionaries' => $dictionaries,
        'deviceDetect' => $deviceDetect,
    ]) ?>
</div>
