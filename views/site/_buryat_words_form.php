<?php

declare(strict_types=1);

use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 */

$this->registerJs("
    $('button.b-letter').on('click', function () {
        let letter = $(this).text();
        let input = $(this).parent('span').siblings('input');
        input.val(input.val() + letter);
        htmx.trigger('#search-input', 'keyup');
    });
", View::POS_LOAD);
?>
<div class="well" id="buryat-words-form">
    <h3>
        Бурятско
        <button class="btn btn-default btn-sm"
                hx-get="<?= Url::to(['site/russian-words-form']) ?>"
                hx-trigger="click"
                hx-target="#buryat-words-form"
                hx-swap="outerHTML"
        >
            <img src="/icon/arrow-left-right.svg" alt="">
        </button>
        Русский словарь
        <span class="htmx-indicator">
            <img src="/icon/loader.svg" alt="Поиск...">
        </span>
    </h3>
    <hr>
    <?php $form = ActiveForm::begin([
        'action' => ['/site/find-buryat-words'],
        'method' => 'get',
    ]) ?>
    <div class="input-group">
        <input type="search" id="search-input" name="q" placeholder="Введите бурятское слово" required="required"
               autocomplete="off" class="form-control input-lg" onkeydown="return (event.keyCode!==13);"
               hx-get="<?= Url::to(['/site/find-buryat-words']) ?>"
               hx-trigger="keyup changed delay:500ms, search"
               hx-target="#translations"
               hx-indicator=".htmx-indicator"
        >
        <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-lg b-letter">ү</button>
            <button type="button" class="btn btn-default btn-lg b-letter">һ</button>
            <button type="button" class="btn btn-default btn-lg b-letter">ө</button>
        </span>
    </div>
    <?php
    ActiveForm::end() ?>
    <div id="translations"></div>
</div>
