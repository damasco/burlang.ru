<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\BuryatWord $model
 * @var array $dictionaries
 */

$this->title = Yii::t('app', 'New word');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buryat-word-create">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dictionaries' => $dictionaries,
    ]) ?>

</div>
