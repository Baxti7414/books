<?php

namespace app\modules\admin\controllers;

use app\models\Authors;
use app\models\Genre;
use app\models\BooksAuthors;
use app\models\BooksGenre;
use Yii;
use app\models\Books;
use app\models\BooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Books models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Books();

        $post = Yii::$app->request->post();
        if ($model->load($post)) {

            $image = UploadedFile::getInstance($model, 'image');
            $time = date('YmdHis');
            if($image){
                $model->image = 'images/books/images/' . $time . '.' . $image->extension;
            }
            $file = UploadedFile::getInstance($model, 'file');
            $time = date('YmdHis');
            if($file){
                $model->file = 'images/books/files/' . $time . '.' . $file->extension;
            }
            //vd($post);
            if($model->save()){
                foreach (Authors::findAll($post['Books']['authors']) as $author){
                    $model->link('authors', $author);
                }

                foreach (Genre::findAll($post['Books']['genres']) as $genre){
                    $model->link('genres', $genre);
                }

                if($image){
                    $dir = \Yii::getAlias('@app');
                    $image->saveAs($dir.'/web/images/books/images/' .$time . '.' . $image->extension);
                }
                if($file){
                    $dir = \Yii::getAlias('@app');
                    $file->saveAs($dir.'/web/images/books/files/' .$time . '.' . $file->extension);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                vd($model->errors);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate2()
    {
        $model = new Books();
        $author = new Authors();

        $post = Yii::$app->request->post();
        if ($model->load($post)) {

            $image = UploadedFile::getInstance($model, 'image');
            $time = date('YmdHis');
            if($image){
                $model->image = 'images/books/images/' . $time . '.' . $image->extension;
            }
            $file = UploadedFile::getInstance($model, 'file');
            $time = date('YmdHis');
            if($file){
                $model->file = 'images/books/files/' . $time . '.' . $file->extension;
            }
            //vd($post);
            $idArr = [];
            foreach ($post['Books']['authors'] as $author){
                $author = trim($author);
                $authorObject = Authors::find()->where(['fio' => $author])->one();
                if(is_null($authorObject)){
                    $authorObject = new Authors();
                    $authorObject->fio = $author;
                    $authorObject->save();
                    $idArr[] = $authorObject->id;
                }else{
                    $idArr[] = $authorObject->id;
                }
            }
            ///vd($idArr);
            if($model->save()){
                foreach ($idArr as $id){
                    $ba = new BooksAuthors();
                    $ba->books_id = $model->id;
                    $ba->author_id = $id;
                    if(!$ba->save()){
                        vd($ba->errors);
                    }
                }

                foreach (Genre::findAll($post['Books']['genres']) as $genre){
                    $model->link('genres', $genre);
                }

                if($image){
                    $dir = \Yii::getAlias('@app');
                    $image->saveAs($dir.'/web/images/books/images/' .$time . '.' . $image->extension);
                }
                if($file){
                    $dir = \Yii::getAlias('@app');
                    $file->saveAs($dir.'/web/images/books/files/' .$time . '.' . $file->extension);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                vd($model->errors);
            }
        }

        return $this->render('book_author', [
            'model' => $model,
            'author' => $author,
        ]);
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            $image = UploadedFile::getInstance($model, 'image');
            $time = date('YmdHis');
            if($image){
                $oldImage = $model->image;
                $model->image = 'images/books/images/' . $time . '.' . $image->extension;
            }else{
                $model->image = Books::find()->where(['id' => $id])->one()->image;
            }
            $file = UploadedFile::getInstance($model, 'file');
            $time = date('YmdHis');
            if($file){
                $oldFile = $model->file;
                $model->file = 'images/books/files/' . $time . '.' . $file->extension;
            }else{
                $model->file = Books::find()->where(['id' => $id])->one()->file;
            }
            if($model->save()){
                $model->unlinkAll('authors', true);
                foreach (Authors::findAll($post['Books']['authors']) as $author){
                    $model->link('authors', $author);
                }
                $model->unlinkAll('genres', true);
                foreach (Authors::findAll($post['Books']['genres']) as $genre){
                    $model->link('genres', $genre);
                }
                if ($image) {
                    $dir = \Yii::getAlias('@app');
                    if(is_file($dir.'/web/'.$oldImage))
                        unlink($dir.'/web/'.$oldImage);
                    $image->saveAs($dir . '/web/images/books/images/' . $time . '.' . $image->extension);
                }
                if ($file) {
                    $dir = \Yii::getAlias('@app');
                    if(is_file($dir.'/web/'.$oldFile))
                        unlink($dir.'/web/'.$oldFile);
                    $file->saveAs($dir . '/web/images/books/files/' . $time . '.' . $file->extension);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Books::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
