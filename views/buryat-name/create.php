<?php

use app\models\BuryatName;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var BuryatName $model
 */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buryat names'), 'url' => ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buryat-name-create">
    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
