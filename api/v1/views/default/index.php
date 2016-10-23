<?php

use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * @var yii\web\View $this
 */

$this->title = 'Api v1';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="v1-default-index">

    <h1><?= $this->title ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Yii::t('app', 'Names') ?>
            </h4>
        </div>
        <div class="panel-body">
            <?= Menu::widget([
                'items' => [
                    ['label' => Url::to(['/v1/buryat-name/search', 'q' => 'begin_search_name'], true)],
                    ['label' => Url::to(['/v1/buryat-name/get-name', 'q' => 'Name'], true)]
                ],
                'labelTemplate' => '<code>{label}</code>',
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Yii::t('app', 'Buryat words') ?>
            </h4>
        </div>
        <div class="panel-body">
            <?= Menu::widget([
                'items' => [
                    ['label' => Url::to(['/v1/buryat-word/search', 'q' => 'begin_search_word'], true)],
                    ['label' => Url::to(['/v1/buryat-word/translate', 'q' => 'Word'], true)]
                ],
                'labelTemplate' => '<code>{label}</code>',
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Yii::t('app', 'Russian words') ?>
            </h4>
        </div>
        <div class="panel-body">
            <?= Menu::widget([
                'items' => [
                    ['label' => Url::to(['/v1/russian-word/search', 'q' => 'begin_search_word'], true)],
                    ['label' => Url::to(['/v1/russian-word/translate', 'q' => 'Word'], true)]
                ],
                'labelTemplate' => '<code>{label}</code>',
            ]) ?>
        </div>
    </div>

</div>
