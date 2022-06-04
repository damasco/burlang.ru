<?php

declare(strict_types=1);

use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="well" id="r-to-b-block">
    <h3>
        Русско
        <button class="btn btn-default btn-sm"
                hx-get="<?= Url::to(['site/buryat-to-russian']) ?>"
                hx-trigger="click"
                hx-target="#r-to-b-block"
                hx-swap="outerHTML"
        >
            <img src="/icon/arrow-left-right.svg" alt="">
        </button>
        Бурятский словарь
        <span class="htmx-indicator">
            <img src="/icon/loader.svg" alt="Поиск...">
        </span>
    </h3>
    <hr>
    <?php $form = ActiveForm::begin([
        'action' => ['/site/russian-word-translate'],
        'method' => 'get',
    ]) ?>
    <input type="search" name="q" placeholder="Введите русское слово" required="required"
           autocomplete="off" class="form-control input-lg" onkeydown="return (event.keyCode!=13);"
           hx-get="<?= Url::to(['/site/russian-word-translate']) ?>"
           hx-trigger="keyup changed delay:500ms, search"
           hx-target="#russian-translations"
           hx-indicator=".htmx-indicator"
    >
    <?php ActiveForm::end() ?>
    <div id="russian-translations"></div>
</div>
