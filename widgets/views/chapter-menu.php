<?php

use yii\helpers\Html;

/**
 * @var \app\models\Book $model
 * @var int|null $active_id
 */
?>

    <div class="list-group">
        <?= Html::a(Yii::t('app', 'Main'), ['view', 'slug' => $model->slug],
            ['class' => $active_id == null ? 'list-group-item active' : 'list-group-item']) ?>
        <?php if ($model->getChapters()->exists()): ?>
            <?php /** @var \app\models\BookChapter $chapter */
            foreach ($model->chapters as $chapter): ?>
                <?= Html::a(Html::encode($chapter->title),
                    ['chapter', 'slug' => $chapter->book->slug, 'slug_chapter' => $chapter->slug],
                    ['class' => $chapter->id == $active_id ? 'list-group-item active' : 'list-group-item']) ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>

<?php if (Yii::$app->user->can('adminBook')): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Add chapter'), ['chapter-create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif ?>