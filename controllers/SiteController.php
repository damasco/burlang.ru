<?php

namespace app\controllers;

use app\components\DeviceDetect\DeviceDetectInterface;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    /**
     * {@inheritDoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'error',
                            'index',
                        ],
                        'roles' => ['?', '@'],
                    ]
                ],
            ],
        ];
    }

    public function actionIndex(DeviceDetectInterface $deviceDetect): string
    {
        return $this->render('index', [
            'deviceDetect' => $deviceDetect,
        ]);
    }
}
