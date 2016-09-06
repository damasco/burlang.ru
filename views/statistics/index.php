<?php

/**
 * @var \yii\web\View $this
 * @var array $buryatWords
 * @var array $russianWords
 * @var array $names
 */

$this->title = Yii::t('app', 'Statistics');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="statistics-index">

    <h1 class="hidden-xs"><?= $this->title ?></h1>

    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('app', 'Buryat words') ?></h1>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge"><?= $buryatWords['amount'] ?></span>
                        <?= Yii::t('app', 'Amount of words') ?>
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $buryatWords['amountTranslations'] ?></span>
                        <?= Yii::t('app', 'Amount of translations') ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('app', 'Russian words') ?></h1>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge"><?= $russianWords['amount'] ?></span>
                        <?= Yii::t('app', 'Amount of words') ?>
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $russianWords['amountTranslations'] ?></span>
                        <?= Yii::t('app', 'Amount of translations') ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Yii::t('app', 'Names') ?></h1>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge"><?= $names['amount'] ?></span>
                        <?= Yii::t('app', 'Amount') ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
