<?php

namespace app\controllers;

use app\components\DeviceDetect\DeviceDetectInterface;
use app\models\Dictionary;
use app\models\RussianTranslation;
use app\models\RussianWord;
use app\models\search\RussianWordSearch;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class RussianWordController extends Controller
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
                    'create' => ['GET', 'POST'],
                    'update' => ['GET', 'POST'],
                    'delete' => ['POST'],
                    'delete-translation' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'delete-translation',
                        ],
                        'roles' => ['moderator'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(DeviceDetectInterface $deviceDetect): string
    {
        $searchModel = new RussianWordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'deviceDetect' => $deviceDetect,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $word = new RussianWord();
        $dictionaries = ArrayHelper::map(
            Dictionary::find()->asArray()->all(),
            'id',
            'name'
        );
        if ($word->load(Yii::$app->request->post()) && $word->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'The word is added'));
            return $this->redirect(['update', 'id' => $word->id]);
        }
        return $this->render('create', [
            'model' => $word,
            'dictionaries' => $dictionaries,
        ]);
    }

    /**
     * @param DeviceDetectInterface $deviceDetect
     * @param int $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate(DeviceDetectInterface $deviceDetect, int $id)
    {
        $word = $this->getWord($id);
        $dictionaries = ArrayHelper::map(
            Dictionary::find()->asArray()->all(),
            'id',
            'name'
        );
        $translationForm = new RussianTranslation();
        $translationForm->ruword_id = $word->id;
        if ($translationForm->load(Yii::$app->request->post()) && $translationForm->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Translation added'));
            return $this->refresh();
        }
        if ($word->load(Yii::$app->request->post()) && $word->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Data updated'));
            return $this->refresh();
        }
        return $this->render('update', [
            'model' => $word,
            'translationForm' => $translationForm,
            'dictionaries' => $dictionaries,
            'deviceDetect' => $deviceDetect,
        ]);
    }

    /**
     * @param int $id
     * @return Response
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function actionDelete(int $id): Response
    {
        $word = $this->getWord($id);
        if (!$word->delete()) {
            throw new Exception(Yii::t('app', 'Can not delete word'));
        }
        Yii::$app->session->setFlash('success', Yii::t('app', 'Word deleted'));
        return $this->redirect(['index']);
    }

    /**
     * @param int $id
     * @return Response
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function actionDeleteTranslation(int $id): Response
    {
        $translation = $this->getTranslation($id);
        if (!$translation->delete()) {
            throw new Exception(Yii::t('app', 'Can not delete word'));
        }
        Yii::$app->session->setFlash('success', Yii::t('app', 'Translation removed'));
        return $this->redirect(['update', 'id' => $translation->ruword_id]);
    }

    /**
     * @param int $id
     * @return RussianWord
     * @throws NotFoundHttpException
     */
    private function getWord(int $id): RussianWord
    {
        $word = RussianWord::findOne($id);
        if (!$word) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        return $word;
    }

    private function getTranslation(int $id): RussianTranslation
    {
        $translation = RussianTranslation::findOne($id);
        if (!$translation) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        return $translation;
    }
}
