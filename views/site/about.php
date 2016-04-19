<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About project');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="content-text">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi consequuntur deleniti deserunt et eveniet expedita fuga, ipsum laborum laudantium molestiae nihil nostrum odit omnis placeat quae quas repellat repellendus vel!
        </p>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="mt20 comment-block">
                <?= $this->render('//_comments') ?>
            </div>
        </div>
    </div>
</div>
