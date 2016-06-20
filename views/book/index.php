<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var yii\web\View $this */
/* @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a(Yii::t('app', 'Create book'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'layout' => "{summary}\n<div class=\"row\">{items}</div>\n{pager}",
        'itemView' => '_view'
    ]); ?>

</div>
