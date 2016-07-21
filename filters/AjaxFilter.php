<?php

namespace app\filters;

use Yii;
use yii\base\ActionEvent;
use yii\web\BadRequestHttpException;
use yii\base\Behavior;
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
 *             'actions' => ['action-first', 'action-second'],
 *         ],
 *          ...
 *      ];
 * }
 *
 * @author Bulat Damdinov <dbulats88@gmail.com>
 */
class AjaxFilter extends Behavior
{
    /* @var array */
    public $actions = [];

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
     * @param ActionEvent $event
     * @return bool
     * @throws BadRequestHttpException if action is not ajax request
     */
    public function beforeAction($event)
    {
        if (in_array($event->action->id, $this->actions)) {
            if (!Yii::$app->request->isAjax) {
                throw new BadRequestHttpException(Yii::t('app', 'This URL can only call using Ajax.'));
            }
        }

        return $event->isValid;
    }
}