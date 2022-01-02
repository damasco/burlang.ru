<?php

namespace app\modules\user\controllers;

use dektrium\user\Finder;
use dektrium\user\Module;
use Yii;
use yii\base\Module as BaseModule;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * @property Module $module
 */
class ProfileController extends Controller
{
    protected Finder $finder;

    /**
     * @param string $id
     * @param BaseModule $module
     * @param Finder $finder
     * @param array $config
     */
    public function __construct($id, $module, Finder $finder, $config = [])
    {
        $this->finder = $finder;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow' => true, 'roles' => ['@']],
                ],
            ],
        ];
    }

    public function actionIndex(): Response
    {
        return $this->redirect(['show', 'id' => Yii::$app->user->getId()]);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionShow(int $id): string
    {
        $profile = $this->finder->findProfileById($id);

        if (!$profile) {
            throw new NotFoundHttpException();
        }

        return $this->render('show', [
            'profile' => $profile,
            'user' => $profile->user,
        ]);
    }
}
