<?php

namespace app\controllers;

use app\models\Dictionary;
use app\models\BuryatTranslation;
use Yii;
use app\models\BuryatWord;
use app\models\search\BuryatWordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BuryatWordController implements the CRUD actions for BuryatWord model.
 */
class BuryatWordController extends Controller
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
                    'delete-translate' => ['POST'],
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
     * Lists all BuryatWord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BuryatWordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new BuryatWord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BuryatWord();

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
     * Updates an existing BuryatWord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dictionaries = Dictionary::find()->asArray()->all();

        $translationForm = new BuryatTranslation();
        $translationForm->burword_id = $model->id;
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
                'dictionaries' => $dictionaries,
                'translationForm' => $translationForm
            ]);
        }
    }

    /**
     * Deletes an existing BuryatWord model.
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
     * Finds the BuryatWord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BuryatWord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BuryatWord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Deletes an existing BuryatTranslation model
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the translate cannot be found
     */
    public function actionDeleteTranslation($id)
    {
        /* @var BuryatTranslation $translate */
        if (($translate = BuryatTranslation::findOne($id)) !== null) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Translation removed'));
            $translate->delete();
            return $this->redirect(['update', 'id' => $translate->burword_id]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
