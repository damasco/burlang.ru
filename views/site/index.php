<?php

use app\widgets\Comments;
use app\widgets\LastNews;
use yii\web\View;

/**
 * @var View $this
 */

$this->title = Yii::$app->name . ' - Русско-Бурятский, Бурятско-Русский электронный словарь';
?>
<div class="site-index">
    <div class="row mt-10">
        <div class="col-sm-8">
            <?= $this->render('_buryat_form') ?>
            <br>
            <?= Comments::widget() ?>
        </div>
        <div class="col-sm-4">
            <?= LastNews::widget() ?>
        </div>
    </div>
</div>
