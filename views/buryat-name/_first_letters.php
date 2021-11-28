<?php

use yii\helpers\Html;

/**
 * @var array $firstLetters
 * @var string $currentLetter
 */
?>
<?php if ($firstLetters): ?>
    <ul class="list-inline list-letter">
        <?php foreach ($firstLetters as $firstLetter): ?>
            <li>
                <?= Html::a(
                    $firstLetter['letter'] . ' ' . Html::tag('span', $firstLetter['amount'], ['class' => 'badge']),
                    ['/buryat-name/index', 'letter' => $firstLetter['letter']],
                    [
                        'class' => sprintf(
                            'btn btn-default btn-lg%s',
                            $currentLetter === $firstLetter['letter'] ? ' active' : ''
                        )
                    ]
                ) ?>
            </li>
        <?php endforeach ?>
    </ul>
    <br/>
<?php endif ?>
