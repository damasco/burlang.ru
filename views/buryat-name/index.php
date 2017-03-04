<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var array $names
 * @var string|null $letter
 */

$this->title = Yii::t('app', 'Names');

if ($letter !== null) {
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $letter;
} else {
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="buryat-name-list" data-url="<?= \yii\helpers\Url::to(['buryat-name/view-name']) ?>">

    <h1 class="hidden-xs"><?= Html::encode($this->title) ?></h1>

    <?= \app\widgets\AlphabetNames::widget(['letter' => $letter]) ?>

    <?php if (!empty($names)): ?>
        <ul class="list-inline list-name">
            <?php foreach ($names as $name): ?>
                <li>
                    <?= Html::a(
                        $name['name'],
                        ['view-name', 'name' => $name['name']],
                        ['class' => 'btn btn-default js-link-name']
                    ) ?>
                </li>
            <?php endforeach ?>
        </ul>
        <div class="modal fade" id="view-name-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <?= Yii::t('app', 'Close') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

</div>
