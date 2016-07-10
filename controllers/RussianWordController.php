<?php

namespace app\controllers;

use app\models\RussianTranslation;
use Yii;
use app\models\RussianWord;
use app\models\search\RussianWordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RussianWordController implements the CRUD actions for RussianWord model.
 */
class RussianWordController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['moderator'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all RussianWord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RussianWordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new RussianWord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RussianWord();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'The word is added'));
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RussianWord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $translationForm = new RussianTranslation();
        $translationForm->ruword_id = $model->id;
        if ($translationForm->load(Yii::$app->request->post()) && $translationForm->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Translation added'));
            return $this->refresh();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Data updated'));
            return $this->refresh();
        } else {
            return $this->render('update', [
                'model' => $model,
                'translationForm' => $translationForm,
            ]);
        }
    }

    /**
     * Deletes an existing RussianWord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RussianWord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RussianWord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RussianWord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Deletes an existing RussianTranslation model
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the translate cannot be found
     */
    public function actionDeleteTranslation($id)
    {
        /* @var RussianTranslation $translate */
        if (($translate = RussianTranslation::findOne($id)) !== null) {
            $translate->delete();
            Yii::$app->session->setFlash('success', Yii::t('app', 'Translation removed'));
            return $this->redirect(['update', 'id' => $translate->ruword_id]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
