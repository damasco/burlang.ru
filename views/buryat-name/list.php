<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BuryatNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $alphabet array */

$this->title = Yii::t('app', 'Buryat names');
$this->params['breadcrumbs'][] = $this->title;
?>

<ul class="list-inline list-word">
    <?php foreach ($alphabet as $word): ?>
        <li><?= Html::a($word, ['/buryat-name/get-names'], ['class' => 'btn btn-default btn-lg btn-block']) ?></li>
    <?php endforeach ?>
</ul>
