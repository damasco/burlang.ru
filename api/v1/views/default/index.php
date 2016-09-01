<?php

/**
 * @var yii\web\View $this
 */

$this->title = 'Api v1';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="v1-default-index">
    <h1><?= $this->title ?></h1>

    <?= $this->render('_view', [
        'title' => Yii::t('app', 'Names'),
        'links' => [
            ['/v1/buryat-name/get-names', 'q' => 'begin_search_name'],
            ['/v1/buryat-name/view', 'name' => 'Name'],
        ]
    ]) ?>

    <?= $this->render('_view', [
        'title' => Yii::t('app', 'Buryat words'),
        'links' => [
            ['/v1/buryat-word/get-words', 'q' => 'begin_search_word'],
            ['/v1/buryat-word/translate', 'word' => 'Word'],
        ]
    ]) ?>

    <?= $this->render('_view', [
        'title' => Yii::t('app', 'Russian words'),
        'links' => [
            ['/v1/russian-word/get-words', 'q' => 'begin_search_word'],
            ['/v1/russian-word/translate', 'word' => 'Word'],
        ]
    ]) ?>
</div>
