<?php

use yii\web\View;
use yii\widgets\Menu;

/**
 * @var View $this
 */
?>
<?= Menu::widget([
    'items' => [
        [
            'label' => Yii::t('app', 'Data'),
            'url' => ['index'],
            'active' => Yii::$app->controller->action->id === 'index'
        ],
        [
            'label' => Yii::t('app', 'Search'),
            'url' => ['search'],
            'active' => Yii::$app->controller->action->id === 'search'
        ],
    ],
    'options' => [
        'class' => 'nav nav-tabs'
    ]
]) ?>
<br>