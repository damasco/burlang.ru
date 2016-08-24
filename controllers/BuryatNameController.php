<?php

namespace app\controllers;

use Yii;
use app\models\BuryatName;
use app\models\search\BuryatNameSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\filters\AjaxFilter;

/**
 * BuryatNameController implements the CRUD actions for BuryatName model.
 */
class BuryatNameController extends Controller
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
                'except' => ['index', 'view-name'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['moderator'],
                    ],
                ],
            ],
            [
                'class' => AjaxFilter::className(),
                'only' => ['view-name'],
            ]
        ];
    }

    /**
     * Lists all BuryatName models.
     * @param string $letter
     * @return mixed
     * @throws NotFoundHttpException if the first letter cannot be found
     */
    public function actionIndex($letter = null)
    {

        $alphabet = BuryatName::getFirstLetterCount();

        $names = [];

        if ($letter !== null) {
            if (!in_array($letter, ArrayHelper::getColumn($alphabet, 'letter'))) {
                throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
            }
            $names = BuryatName::find()
                ->where(['like', 'name', $letter . '%', false])
                ->asArray()
                ->all();
        }

        return $this->render('index', [
            'alphabet' => $alphabet,
            'names' => $names,
            'letter' => $letter
        ]);
    }

    /**
     * Displays a single BuryatName model.
     * @param string $name
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewName($name)
    {
        if (($model = BuryatName::findOne(['name' => $name])) !== null) {
            return $this->renderAjax('_description_name', [
                'model' => $model
            ]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Lists all BuryatName models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $searchModel = new BuryatNameSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BuryatName model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BuryatName model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BuryatName();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BuryatName model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BuryatName model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', Yii::t('app', 'Name deleted'));

        return $this->redirect(['admin']);
    }

    /**
     * Finds the BuryatName model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BuryatName the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BuryatName::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
