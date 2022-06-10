<?php

use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var array<string, int> $letters
 * @var string[] $names
 */

$chunkLength = (int)(ceil(count($names) / 4));
$this->title = 'Бурятские имена';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buryat-name-list">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?php if ($letters): ?>
        <ul class="list-inline list-letter">
            <?php foreach ($letters as $letter => $amount): ?>
                <li class="mb-5">
                    <?= Html::a(
                        $letter . ' ' . Html::tag('span', $amount, ['class' => 'badge']),
                        ['/buryat-name/letter', 'letter' => $letter],
                        [
                            'class' => 'btn btn-default btn-lg',
                            'style' => 'width: 85px;',
                        ]
                    ) ?>
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <hr>
    <?php if ($names): ?>
        <div class="row">
            <?php foreach (array_chunk($names, $chunkLength) as $namesChunk): ?>
                <div class="col-md-3">
                    <?php foreach ($namesChunk as $name): ?>
                        <div>
                            <?= Html::a(
                                $name,
                                ['view', 'name' => $name],
                                ['class' => 'btn btn-default mb-5']
                            ) ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>
