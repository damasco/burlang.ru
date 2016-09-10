<?php

use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * @var string $title
 * @var array $links
 */

$items = [];
foreach ($links as $link) {
    $items[] = ['label' => Url::to($link, true)];
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <?= $title ?>
        </h4>
    </div>
    <div class="panel-body">
        <?= Menu::widget([
            'items' => $items,
            'labelTemplate' => '<code>{label}</code>',
        ]) ?>
    </div>
</div>
