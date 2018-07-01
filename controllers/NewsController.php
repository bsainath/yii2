<?php

namespace app\controllers;

use app\models\TblPrtAds;
use Yii;
use app\models\TblPrtNews;
use app\models\TblPrtNewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for TblPrtNews model.
 */
class NewsController extends BaseController
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
        ];
    }

    /**
     * Lists all TblPrtNews models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPrtNewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPrtNews model.
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
     * Creates a new TblPrtNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPrtNews();

        if ($model->load(Yii::$app->request->post())) {
            
            $model->news_type=1;
            
            $model->created_date=date('Y-m-d h:i:s');
           
            if($model->save()){
                
            }
            
            //return $this->redirect(['view', 'id' => $model->news_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblPrtNews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // return $this->redirect(['view', 'id' => $model->news_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPrtNews model.
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
     * Finds the TblPrtNews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPrtNews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPrtNews::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAdd(){
        $model=TblPrtAds::find()->one();
        if(empty($adds)){
            $model=new TblPrtAds();
        }



        if(Yii::$app->request->isPost) {

            $model->created_by=\Yii::$app->user->id;

            $model->created_date=date('Y-m-d h:i:s');

            $model_upload = new UploadForm();
            $model_upload->opening_add = UploadedFile::getInstance($model, 'opening_add');
            //print_r($model_upload->profile_pic); die();
            if (!empty($model_upload->opening_add)) {

                $model->opening_add = str_replace(' ', '_', $model_upload->opening_add->baseName) .mt_rand(10,100). 'add.' . $model_upload->opening_add->extension;
                if ($model_upload->opening_add && $model_upload->validate()) {
                    $model_upload->opening_add->saveAs('uploads/add/' . $model->opening_add);
                 }
            }

            $model_upload = new UploadForm();
            $model_upload->header_add = UploadedFile::getInstance($model, 'header_add');
            //print_r($model_upload->profile_pic); die();
            if (!empty($model_upload->header_add)) {

                $model->header_add = str_replace(' ', '_', $model_upload->header_add->baseName) .mt_rand(10,100). 'add.' . $model_upload->header_add->extension;
                if ($model_upload->header_add && $model_upload->validate()) {
                    $model_upload->header_add->saveAs('uploads/add/' . $model->header_add);
                }
            }

            $model_upload = new UploadForm();
            $model_upload->top_add = UploadedFile::getInstance($model, 'top_add');
            //print_r($model_upload->profile_pic); die();
            if (!empty($model_upload->top_add)) {

                $model->top_add = str_replace(' ', '_', $model_upload->top_add->baseName) .mt_rand(10,100). 'add.' . $model_upload->top_add->extension;
                if ($model_upload->top_add && $model_upload->validate()) {
                    $model_upload->top_add->saveAs('uploads/add/' . $model->top_add);
                }
            }
            $model_upload = new UploadForm();
            $model_upload->bottom_add = UploadedFile::getInstance($model, 'bottom_add');
            //print_r($model_upload->profile_pic); die();
            if (!empty($model_upload->bottom_add)) {

                $model->bottom_add = str_replace(' ', '_', $model_upload->bottom_add->baseName) .mt_rand(10,100). 'add.' . $model_upload->bottom_add->extension;
                if ($model_upload->bottom_add && $model_upload->validate()) {
                    $model_upload->bottom_add->saveAs('uploads/add/' . $model->bottom_add);
                }
            }

            if($model->save()){

            }else{
                print_r($model->errors); die();
            }
        }
        return $this->render('adds',['model'=>$model]);
    }
}
