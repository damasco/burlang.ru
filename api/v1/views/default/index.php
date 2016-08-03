<?php

/**
 * @var yii\web\View $this
 */

$this->title = 'v1';
$this->params['breadcrumbs'][] = ['label' => 'Api', 'url' => ['/api/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="v1-default-index">
    <h1><?= $this->title ?></h1>

    <h4>Example:</h4>
    <ul>
    	<li>
    		<code>/api/v1/buryat-word?word=сайн</code>
    	</li>
    	<li>
    		<code>/api/v1/russian-word?word=привет</code>
    	</li>
    </ul>
</div>
