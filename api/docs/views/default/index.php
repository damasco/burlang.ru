<?php 

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */

$this->title = 'Api';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="api-default-index">
    <h1><?= $this->title ?></h1>

	<h3>
		<?= Html::a('v1', ['/api/v1']) ?>
	</h3>
</div>
