<?php

use yii\bootstrap\Html;
use yii\widgets\ListView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-index">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('adminBook')): ?>
        <p>
            <?= Html::a(
                Html::icon('plus') . ' ' . Yii::t('app', 'Create book'),
                ['create'], ['class' => 'btn btn-success']
            ) ?>
        </p>
    <?php endif ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'layout' => "{summary}\n<div class=\"row\">{items}</div>\n{pager}",
        'itemView' => !Yii::$app->devicedetect->isMobile() ? '_view' : '_view_mobile',
        'pager' => [
            'maxButtonCount' => !Yii::$app->devicedetect->isMobile() ? 10 : 5,
        ],
    ]); ?>

</div>