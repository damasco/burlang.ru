<?php

namespace app\controllers;

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\BuryatName;
use app\models\search\BuryatNameSearch;
use app\services\BuryatNameManager;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
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
     * @param BuryatNameManager $buryatNameManager
     * @param string|null $letter
     * @return mixed
     * @throws NotFoundHttpException if the first letter cannot be found
     */
    public function actionIndex(
        BuryatNameManager $buryatNameManager,
        DeviceDetectInterface $deviceDetect,
        string $letter = null
    )
    {
        $names = $buryatNameManager->getNames($letter);
        $alphabet = $buryatNameManager->getFirstLetters();

        return $this->render('index', [
            'letter' => $letter,
            'names' => $names,
            'alphabet' => $alphabet,
            'deviceDetect' => $deviceDetect,
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
                    'model' => $model,
                ]);
            }
            return $this->render('view', [
                'model' => $model,
            ]);
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Lists all BuryatName models.
     * @param DeviceDetectInterface $deviceDetect
     * @return string
     */
    public function actionAdmin(DeviceDetectInterface $deviceDetect)
    {
        $searchModel = new BuryatNameSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'deviceDetect' => $deviceDetect,
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
        }
        return $this->render('create', [
            'model' => $model,
        ]);
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
        }
        return $this->render('update', [
            'model' => $model,
        ]);
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
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
