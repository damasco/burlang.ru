<?php

use yii\helpers\Html;

/**
 * @var array $alphabet
 * @var string $letter
 */
?>
<?php if ($alphabet): ?>
<ul class="list-inline list-letter">
    <?php foreach ($alphabet as $item): ?>
        <li>
            <?= Html::a(
                $item['letter'] . ' ' . Html::tag('span', $item['amount'], ['class' => 'badge']),
                ['/buryat-name/index', 'letter' => $item['letter']],
                [
                    'class' => $letter === $item['letter'] ?
                        'btn btn-default btn-lg active' :
                        'btn btn-default btn-lg'
                ]
            ) ?>
        </li>
    <?php endforeach ?>
</ul>
<br/>
<?php endif ?>
