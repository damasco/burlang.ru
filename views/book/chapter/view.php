<?php

use app\models\BookChapter;
use app\widgets\ChaptersMenu;
use yii\bootstrap\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
use yii\web\View;

/**
 * @var View $this
 * @var BookChapter $chapter
 */

$this->title = $chapter->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $chapter->book->title, 'url' => ['view', 'slug' => $chapter->book->slug]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">
    <h1 class="hidden-xs">
        <?= Html::encode($chapter->book->title) ?>
    </h1>
    <?= $this->render('/book/_header', ['model' => $chapter->book]) ?>
    <div class="row">
        <div class="col-sm-3 hidden-xs">
            <?= ChaptersMenu::widget(['book' => $chapter->book, 'activeId' => $chapter->id]) ?>
        </div>
        <div class="col-sm-9 col-xs-12">
            <?php if (Yii::$app->user->can('adminBook')): ?>
                <p>
                    <?= Html::a(
                        Html::icon('pencil') . ' ' . Yii::t('app', 'Edit chapter'),
                        ['chapter-update', 'id' => $chapter->id],
                        ['class' => 'btn btn-sm btn-default']
                    ) ?>
                    <?= Html::a(
                        Html::icon('trash') . ' ' . Yii::t('app', 'Delete chapter'),
                        ['chapter-delete', 'id' => $chapter->id],
                        [
                            'class' => 'btn btn-sm btn-default',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete?'),
                                'method' => 'post',
                            ],
                        ]
                    ) ?>
                </p>
            <?php endif ?>
            <div class="image-responsive-container">
                <?= HtmlPurifier::process(Markdown::process($chapter->content, 'gfm')) ?>
            </div>
        </div>
    </div>
</div>
