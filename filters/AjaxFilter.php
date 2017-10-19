<?php

namespace app\filters;

use Yii;
use yii\base\ActionFilter;
use yii\base\InlineAction;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Ajax filter to controller actions
 *
 * public function behaviors()
 * {
 *      return [
 *          ...
 *         [
 *             'class' => AjaxFilter::className(),
 *             'only' => ['action-first', 'action-second'],
 *         ],
 *          ...
 *      ];
 * }
 *
 * @author Bulat Damdinov <dbulats88@gmail.com>
 */
class AjaxFilter extends ActionFilter
{
    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    /**
     * @param InlineAction $action
     * @return bool
     * @throws BadRequestHttpException if action is not ajax request
     */
    public function beforeAction($action)
    {
        if (!Yii::$app->request->isAjax) {
            throw new BadRequestHttpException(Yii::t('app', 'This URL can only call using Ajax.'));
        }

        return true;
    }
}
