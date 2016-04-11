<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $alphabet array */
/* @var $names array */

$this->title = Yii::t('app', 'Buryat names');
$this->params['breadcrumbs'][] = $this->title;
?>

<ul class="list-inline list-word">
    <?php foreach ($alphabet as $word): ?>
        <li>
            <?= Html::a($word, ['/buryat-name/list', 'first_word' => $word], ['class' => 'btn btn-warning btn-lg btn-block']) ?>
        </li>
    <?php endforeach ?>
</ul>

<br/>

<ul class="list-inline list-name">
    <?php foreach ($names as $name): ?>
        <li><?= Html::a($name['name'], ['get-name', 'name' => $name['name']], ['class' => 'btn btn-default']) ?></li>
    <?php endforeach ?>
</ul>
