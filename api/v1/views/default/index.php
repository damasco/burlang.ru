<?php

use yii\helpers\Url;

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
            <ul>
                <li>
                    <code><?= Url::to(['/v1/buryat-name/get-names', 'q' => 'begin_search_name'], true) ?></code>
                </li>
                <li>
                    <code><?= Url::to(['/v1/buryat-name/view', 'name' => 'Name'], true) ?></code>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Yii::t('app', 'Buryat words') ?>
            </h4>
        </div>
        <div class="panel-body">
            <ul>
                <li>
                    <code><?= Url::to(['/v1/buryat-word/get-words', 'q' => 'begin_search_word'], true) ?></code>
                </li>
                <li>
                    <code><?= Url::to(['/v1/buryat-word/translate', 'word' => 'Word'], true) ?></code>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Yii::t('app', 'Russian words') ?>
            </h4>
        </div>
        <div class="panel-body">
            <ul>
                <li>
                    <code><?= Url::to(['/v1/russian-word/get-words', 'q' => 'begin_search_word'], true) ?></code>
                </li>
                <li>
                    <code><?= Url::to(['/v1/russian-word/translate', 'word' => 'Word'], true) ?></code>
                </li>
            </ul>  
        </div>
    </div>
</div>
