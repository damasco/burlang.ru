<?php

namespace app\controllers;

use Yii;
use app\models\BuryatName;
use app\models\BuryatNameSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
                'except' => ['list', 'get-name'],
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
     * Lists all BuryatName models.
     * @param string $first_letter
     * @return mixed
     */
    public function actionList($first_letter = null)
    {
        $names = [];
        if ($first_letter !== null) {
            $names = BuryatName::find()->where(['like', 'name', $first_letter . '%', false])->asArray()->all();
        }

        $alphabet = ['А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Х','Ц','Ч','Ш','Э','Ю','Я'];

        return $this->render('list', [
            'alphabet' => $alphabet,
            'names' => $names,
            'first_letter' => $first_letter
        ]);
    }

    /**
     * Displays a single BuryatName model.
     * @param string $name
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionGetName($name)
    {
        if (($model = BuryatName::findOne(['name' => $name])) !== null) {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('get-name', [
                    'model' => $model
                ]);
            } else {
                return $this->render('get-name', [
                    'model' => $model
                ]);
            }
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Lists all BuryatName models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BuryatNameSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
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

        return $this->redirect(['index']);
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
