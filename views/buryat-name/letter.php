<?php

declare(strict_types=1);

use app\models\BuryatName;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var string $letter
 * @var BuryatName[] $names
 */

$chunkLength = (int)(ceil(count($names) / 4));

$this->title = sprintf('Бурятские имена на букву "%s"', mb_strtoupper($letter));
$this->params['breadcrumbs'][] = ['label' => 'Бурятские имена', 'url' => ['index']];
$this->params['breadcrumbs'][] = sprintf('На букву "%s"', mb_strtoupper($letter));
?>
<h1><?= Html::encode($this->title) ?></h1>
<hr>
<?php if ($names): ?>
    <div class="row">
        <?php foreach (array_chunk($names, $chunkLength) as $namesChunk): ?>
            <div class="col-md-3">
                <?php
                /** @var BuryatName $name */
                foreach ($namesChunk as $name): ?>
                    <?= Html::a(
                        $name->name,
                        ['view', 'name' => $name->name],
                        ['class' => 'btn btn-default mb-5']
                    ) ?>
                    <br>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    </div>
<?php else: ?>
    <h3>Имена не найдены</h3>
<?php endif ?>
