<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\BookChapter;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
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
                'except' => ['index', 'view', 'chapter'],
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
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Book::find()->orderBy('created_at DESC');

        if (Yii::$app->user->isGuest) {
            $query->where(['active' => 1]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if (!$model->active && Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        } else {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Book model.
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
     * Deletes an existing Book model.
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
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Creates a new BookChapter model.
     * If creation is successful, the browser will be redirected to the 'chapter' page.
     * @param integer $id
     * @return mixed
     */
    public function actionChapterCreate($id)
    {
        $book = $this->findModel($id);
        $model = new BookChapter();
        $model->book_id = $book->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['chapter', 'id' => $model->id]);
        } else {
            return $this->render('chapter/create', [
                'model' => $model,
                'book' => $book,
            ]);
        }
    }

    /**
     * Updates an existing BookChapter model.
     * If update is successful, the browser will be redirected to the 'chapter' page.
     * @param integer $id
     * @return mixed
     */
    public function actionChapterUpdate($id)
    {
        $model = $this->findChapter($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['chapter', 'id' => $model->id]);
        } else {
            return $this->render('chapter/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single BookChapter model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionChapter($id)
    {
        $model = $this->findChapter($id);

        if (!$model->book->active && Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        } else {
            return $this->render('chapter/view', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BookChapter model.
     * If deletion is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionChapterDelete($id)
    {
        $model = $this->findChapter($id);
        $model->delete();

        return $this->redirect(['view', 'id' => $model->book->id]);
    }

    /**
     * Finds the BookChapter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookChapter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findChapter($id)
    {
        if (($model = BookChapter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

}
