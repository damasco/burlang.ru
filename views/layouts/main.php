<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php if (isset($this->blocks['head'])): ?>
        <?= $this->blocks['head'] ?>
    <?php endif ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]) ?>
    <?= Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => Yii::t('app', 'Main'),
                'url' => Yii::$app->homeUrl,
                'active' => Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'
            ],
            [
                'label' => Yii::t('app', 'Buryat names'),
                'url' => ['/buryat-name/list'],
                'active' => Yii::$app->controller->id == 'buryat-name' && Yii::$app->controller->action->id == 'list'
            ],
            ['label' => Yii::t('app', 'News'), 'url' => ['/news/index'], 'active' => Yii::$app->controller->id == 'news'],
            ['label' => Yii::t('app', 'About project'), 'url' => ['/site/about']],
            !Yii::$app->user->isGuest ?
            [
                'label' => Yii::t('app', 'Control'),
                'items' => [
                    ['label' => Yii::t('app', 'Bur. names'), 'url' => ['/buryat-name/index']],
                    ['label' => Yii::t('app', 'Bur. words'), 'url' => ['/burwords/index']],
                    ['label' => Yii::t('app', 'Ru. words'), 'url' => ['/ruwords/index']],
                    ['label' => Yii::t('user', 'Users'), 'url' => ['/user/admin/index']],
                ],
            ] : '',
            Yii::$app->user->isGuest ?
                ['label' => Yii::t('app', 'Login'), 'url' => ['/user/security/login']] :
                [
                    'label' => Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => Yii::t('user', 'Profile'), 'url' => ['/user/profile/show', 'id' => Yii::$app->user->identity->id]],
                        ['label' => Yii::t('user', 'Profile settings'), 'url' => ['/user/settings/profile', 'id' => Yii::$app->user->identity->id]],
                        '<li role="separator" class="divider"></li>',
                        ['label' => Yii::t('user', 'Logout'), 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']]
                    ]
                ]
        ],
    ]) ?>
    <?php NavBar::end() ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name ?> 2013 - <?= date('Y') ?></p>
        <p class="pull-right">
            <?= Html::mailto('dbulats88@gmail.com') ?>
            <?= Html::mailto('bairdarmaev@gmail.com') ?>
        </p>
    </div>
</footer>
<?= $this->render('//_end_body') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
