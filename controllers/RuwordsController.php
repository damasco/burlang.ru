<?php

namespace app\controllers;

use app\models\Burtranslations;
use app\models\Dictionaries;
use Yii;
use app\models\Ruwords;
use app\models\RuwordsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RuwordsController implements the CRUD actions for Ruwords model.
 */
class RuwordsController extends Controller
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
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Ruwords models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuwordsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Ruwords model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ruwords();

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
     * Updates an existing Ruwords model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dictionaries = Dictionaries::find()->asArray()->all();

        $translationForm = new Burtranslations();
        $translationForm->ruword_id = $model->id;
        if ($translationForm->load(Yii::$app->request->post()) && $translationForm->save()) {
            return $this->refresh();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Data updated'));
            return $this->refresh();
        } else {
            return $this->render('update', [
                'model' => $model,
                'translationForm' => $translationForm,
                'dictionaries' => $dictionaries
            ]);
        }
    }

    /**
     * Deletes an existing Ruwords model.
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
     * Finds the Ruwords model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ruwords the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ruwords::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Deletes an existing Burtranslations model
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the translate cannot be found
     */
    public function actionDeleteTranslation($id)
    {
        if (($translate = Burtranslations::findOne($id)) !== null) {
            $translate->delete();
            return $this->redirect(['update', 'id' => $translate->ruword_id]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
