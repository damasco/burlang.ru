<?php

/* @var \yii\web\View $this */
/* @var string $content */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="image_src" href="<?= Url::to(Yii::getAlias('@web/img/cover.jpg'), true) ?>">
    <meta name="image" content="<?= Url::to(Yii::getAlias('@web/img/cover.jpg'), true) ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Burlang.ru"/>
    <meta property="og:title"
          content="<?= !empty($this->title) ? Html::encode($this->title) : Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary') ?>"/>
    <meta property="og:description" content=""/>
    <meta property="og:locale" content="ru_RU"/>
    <meta property="og:url" content="<?= Url::to('', true) ?>"/>
    <meta property="og:image" content="<?= Url::to(Yii::getAlias('@web/img/cover.jpg'), true) ?>"/>
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
    <?php $this->registerMetaTag(['name' => 'keywords', 'content' => 'burlang, burlang.ru, buryat-lang, buryat-lang.ru, buryat, бурятский словарь, бурятские имена, онлайн словарь']) ?>
    <?php $this->registerMetaTag(['name' => 'description', 'content' => Yii::t('app', 'Russian-Buryat, Buryat-Russian electronic dictionary')]) ?>

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
                'url' => ['/buryat-name/index'],
                'active' => Yii::$app->controller->id == 'buryat-name' &&
                    (Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'view-name')
            ],
            [
                'label' => Yii::t('app', 'Books'),
                'url' => ['/book/index'],
                'active' => Yii::$app->controller->id == 'book',
                'visible' => !Yii::$app->user->isGuest,
            ],

            [
                'label' => Yii::t('app', 'News'),
                'url' => ['/news/index'],
                'active' => Yii::$app->controller->id == 'news'
            ],

            Yii::$app->page->itemMenu('translation-service'),
            Yii::$app->page->itemMenu('about'),

            Yii::$app->user->isGuest ?
                ['label' => Yii::t('app', 'Login'), 'url' => ['/user/security/login']] :
                [
                    'label' => Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => Yii::t('app', 'Buryat names'), 'url' => ['/buryat-name/admin']],
                        ['label' => Yii::t('app', 'Buryat words'), 'url' => ['/buryat-word/index']],
                        ['label' => Yii::t('app', 'Russian words'), 'url' => ['/russian-word/index']],
                        ['label' => Yii::t('app', 'Dictionaries'), 'url' => ['/dictionary/index']],
                        ['label' => Yii::t('app', 'Pages'), 'url' => ['/page/index']],
                        ['label' => Yii::t('user', 'Users'), 'url' => ['/user/admin/index'], 'visible' => Yii::$app->user->identity->getIsAdmin()],
                        '<li role="separator" class="divider"></li>',
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
