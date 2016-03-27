<?php

namespace app\controllers;

use app\models\Burwords;
use app\models\Ruwords;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRus()
    {
        $result = Ruwords::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', Yii::$app->request->get('term') . '%', false])
            ->limit(10)
            ->asArray()
            ->all();
        return json_encode($result);
    }

    public function actionBur()
    {
        $result = Burwords::find()
            ->select(['name as value'])
            ->filterWhere(['like', 'name', Yii::$app->request->get('term') . '%', false])
            ->limit(10)
            ->asArray()
            ->all();
        return json_encode($result);
    }

    public function actionRus2bur($rusword)
    {
        $word = Ruwords::findOne(['name' => $rusword]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translate', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'rusword' => $word
        ]);
    }

    public function actionBur2rus($burword)
    {
        $word = Burwords::findOne(['name' => $burword]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_translate', [
                'word' => $word
            ]);
        }
        return $this->render('index', [
            'burword' => $word
        ]);
    }
}
