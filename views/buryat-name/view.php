<?php

use app\models\BuryatName;
use yii\bootstrap\Html;
use yii\web\View;

/**
 * @var View $this
 * @var BuryatName $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => Yii::$app->user->isGuest ? 'Имена' :  'Бурятские имена',
    'url' => Yii::$app->user->isGuest ? ['index'] : ['admin'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buryat-name-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('moderator')): ?>
        <p>
            <?= Html::a(
                Html::icon('pencil') . ' Редактировать',
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a(
                Html::icon('trash') . ' Удалить',
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить?',
                        'method' => 'post',
                    ],
                ]
            ) ?>
        </p>
    <?php endif ?>
    <?= $this->render('_description_name', ['model' => $model]) ?>
</div>
