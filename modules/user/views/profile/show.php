<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\Html;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 * @var \app\modules\user\models\User $user
 */

$this->title = empty($profile->name) ? Html::encode($user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-3">
        <p>
            <?= Html::img($profile->getAvatarUrl(230), [
                'class' => 'img-rounded img-responsive',
                'alt' => $user->username,
            ]) ?>
        </p>
    </div>
    <div class="col-sm-9">
        <?php if (Yii::$app->user->identity->id === $user->id): ?>
            <?= Html::a(
                Html::icon('cog') . ' ' . Yii::t('user', 'Profile settings'),
                ['/user/settings/profile'],
                ['class' => 'btn btn-default']
            ) ?>
        <?php endif ?>
        <h4><?= $this->title ?></h4>
        <ul style="padding: 0; list-style: none outside none;">
            <?php if (!empty($profile->location)): ?>
                <li>
                    <i class="glyphicon glyphicon-map-marker text-muted"></i> <?= Html::encode($profile->location) ?>
                </li>
            <?php endif; ?>
            <?php if (!empty($profile->website)): ?>
                <li>
                    <i class="glyphicon glyphicon-globe text-muted"></i> <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?>
                </li>
            <?php endif; ?>
            <?php if (!empty($profile->public_email)): ?>
                <li>
                    <i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?>
                </li>
            <?php endif; ?>
            <li>
                <i class="glyphicon glyphicon-time text-muted"></i> <?= Yii::t('user', 'Joined on {0, date}', $user->created_at) ?>
            </li>
        </ul>
        <?php if (!empty($profile->bio)): ?>
            <p><?= Html::encode($profile->bio) ?></p>
        <?php endif; ?>

        <div class="panel panel-default">
            <div class="panel-heading">Статистика</div>
            <div class="panel-body">
                <ul>
                    <li>Имена: <?= $user->getBuryatNames()->count() ?></li>
                    <li>
                        Бурятские слова: <?= $user->getBuryatWords()->count() ?>,
                        Переводы: <?= $user->getBuryatTranslations()->count() ?>
                    </li>
                    <li>
                        Русские слова: <?= $user->getRussianWords()->count() ?>,
                        Переводы: <?= $user->getRussianTranslations()->count() ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
