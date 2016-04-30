<?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
    <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
        <div class="alert alert-<?= $type ?>">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $message ?>
        </div>
    <?php endif ?>
<?php endforeach ?>
