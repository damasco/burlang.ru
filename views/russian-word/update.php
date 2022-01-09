<?php

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\RussianTranslation;
use app\models\RussianWord;
use app\widgets\FlashMessages;
use yii\bootstrap\Html;
use yii\web\View;

/**
 * @var View $this
 * @var RussianWord $model
 * @var RussianTranslation $translationForm
 * @var array $dictionaries
 * @var DeviceDetectInterface $deviceDetect
 */

$this->title = Yii::t('app', 'Edit') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Russian words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="russian-word-update">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= FlashMessages::widget() ?>
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
