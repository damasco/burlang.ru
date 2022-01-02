<?php

namespace app\controllers;

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\BuryatName;
use app\models\search\BuryatNameSearch;
use app\services\BuryatNameService;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
     * Lists all buryat names.
     * @param BuryatNameService $buryatNameService
     * @param DeviceDetectInterface $deviceDetect
     * @param string|null $letter
     * @return mixed
     * @throws NotFoundHttpException if the first letter cannot be found
     */
    public function actionIndex(
        BuryatNameService     $buryatNameService,
        DeviceDetectInterface $deviceDetect,
        string                $letter = null
    ) {
        $letter = trim((string)$letter);
        $firstLetters = $buryatNameService->findFirstLetters();
        $names = [];

        if ($letter) {
            if (!in_array($letter, ArrayHelper::getColumn($firstLetters, 'letter'), true)) {
                throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
            }
            $names = $buryatNameService->findNamesByFirstLetter($letter);
        }

        return $this->render('index', [
            'letter' => $letter,
            'names' => $names,
            'firstLetters' => $firstLetters,
            'deviceDetect' => $deviceDetect,
        ]);
    }

    /**
     * Displays a single buryat name.
     * @param string $name
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionViewName(string $name)
    {
        $model = BuryatName::findOne(['name' => $name]);
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_description_name', [
                'model' => $model,
            ]);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Lists all buryat names
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
     * Displays a single buryat name
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView(int $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new buryat name.
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
     * Update a buryat name
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id)
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
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', Yii::t('app', 'Name deleted'));

        return $this->redirect(['admin']);
    }

    /**
     * @param int $id
     * @return BuryatName the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): BuryatName
    {
        $model = BuryatName::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        return $model;
    }
}
