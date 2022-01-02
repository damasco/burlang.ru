<?php

use app\models\Dictionary;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var Dictionary $model
 */

$this->title = Yii::t('app', 'Add dictionary');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dictionaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionary-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
