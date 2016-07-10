<?php

namespace app\controllers;

use Yii;
use app\models\BuryatName;
use app\models\search\BuryatNameSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BuryatNameController implements the CRUD actions for BuryatName model.
 */
class BuryatNameController extends Controller
{
    /* @var array */
    public $alphabet = ['А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Х','Ц','Ч','Ш','Э','Ю','Я'];

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
        $names = [];

        if ($letter !== null) {
            if (!in_array($letter, $this->alphabet)) {
                throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
            }
            $names = BuryatName::find()
                ->where(['like', 'name', $letter . '%', false])
                ->asArray()
                ->all();
        }

        return $this->render('index', [
            'alphabet' => $this->alphabet,
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
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('_description_name', [
                    'model' => $model
                ]);
            } else {
                return $this->render('view', [
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
