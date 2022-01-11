<?php

namespace app\controllers;

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\BuryatName;
use app\models\search\BuryatNameSearch;
use app\services\BuryatNameService;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class BuryatNameController extends Controller
{
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                    'view-name' => ['GET'],
                    'admin' => ['GET'],
                    'view' => ['GET'],
                    'create' => ['GET', 'POST'],
                    'update' => ['GET', 'POST'],
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'view-name',
                        ],
                        'roles' => ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'admin',
                            'view',
                            'create',
                            'update',
                            'delete',
                        ],
                        'roles' => ['moderator'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @param BuryatNameService $buryatNameService
     * @param DeviceDetectInterface $deviceDetect
     * @param string|null $letter
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex(
        BuryatNameService     $buryatNameService,
        DeviceDetectInterface $deviceDetect,
        string                $letter = null
    ): string {
        $letter = trim((string)$letter);
        $firstLetters = $buryatNameService->findFirstLetters();
        $names = [];
        if ($letter) {
            if (!in_array($letter, ArrayHelper::getColumn($firstLetters, 'letter'), true)) {
                throw new NotFoundHttpException('Запрашиваемая страница не существует');
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
     * @param string $name
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionViewName(string $name): string
    {
        $buraytName = BuryatName::findOne(['name' => $name]);
        if (!$buraytName) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует');
        }
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_description_name', [
                'model' => $buraytName,
            ]);
        }
        return $this->render('view', [
            'model' => $buraytName,
        ]);
    }

    /**
     * @param DeviceDetectInterface $deviceDetect
     * @return string
     */
    public function actionAdmin(DeviceDetectInterface $deviceDetect): string
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
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->getName($id),
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $buryatName = new BuryatName();
        if ($buryatName->load(Yii::$app->request->post()) && $buryatName->save()) {
            return $this->redirect(['view', 'id' => $buryatName->id]);
        }
        return $this->render('create', [
            'model' => $buryatName,
        ]);
    }

    /**
     * @param int $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id)
    {
        $buryatName = $this->getName($id);
        if ($buryatName->load(Yii::$app->request->post()) && $buryatName->save()) {
            return $this->redirect(['view', 'id' => $buryatName->id]);
        }
        return $this->render('update', [
            'model' => $buryatName,
        ]);
    }

    /**
     * @param int $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionDelete(int $id)
    {
        $buryatName = $this->getName($id);
        if (!$buryatName->delete()) {
            throw new Exception('Не удалось удалить Имя');
        }
        Yii::$app->session->setFlash('success', 'Имя удалено');
        return $this->redirect(['admin']);
    }

    /**
     * @param int $id
     * @return BuryatName
     * @throws NotFoundHttpException
     */
    protected function getName(int $id): BuryatName
    {
        $name = BuryatName::findOne($id);
        if (!$name) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует');
        }
        return $name;
    }
}
