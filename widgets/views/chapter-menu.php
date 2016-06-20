<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var \app\models\Book $model */
/* @var int|null $active_id */
?>

<div class="list-group">
    <a class="<?= $active_id == null ? 'list-group-item active' : 'list-group-item' ?>"
       href="<?= Url::to(['view', 'id' => $model->id]) ?>">
        <?= Yii::t('app', 'Main') ?>
    </a>
    <?php if ($model->getChapters()->exists()): ?>
        <?php /* @var \app\models\BookChapter $chapter */ ?>
        <?php foreach ($model->chapters as $chapter): ?>
            <a class="<?= $chapter->id == $active_id ? 'list-group-item active' : 'list-group-item' ?>"
               href="<?= Url::to(['chapter', 'id' => $chapter->id]) ?>">
                <?= Html::encode($chapter->title) ?>
            </a>
        <?php endforeach; ?>
    <?php endif ?>
</div>

<?php if (!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Add chapter'), ['chapter-create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif ?>