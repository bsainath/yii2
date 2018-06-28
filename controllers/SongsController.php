<?php

namespace app\controllers;

use Yii;

use app\models\TblPrtSongs;
use yii\data\ActiveDataProvider;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;


/**
 * SongsController implements the CRUD actions for TblPrtSongs model.
 */
class SongsController extends BaseController
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
     * Lists all TblPrtSongs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TblPrtSongs::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPrtSongs model.
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
     * Creates a new TblPrtSongs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPrtSongs();
        
       $form_upload = new UploadForm();
        
        if (Yii::$app->request->isPost){
           // print_r(Yii::$app->request->post('TblPrtSongs')['party_id']); die();
          //  $model->load(Yii::$app->request->post());
            $model->party_id=Yii::$app->request->post('TblPrtSongs')['party_id'];
            $model->created_date=date('Y-m-d h:i:s');
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            
            
          //   print_r($form_upload); die();
            $files= $model->upload();
           // print_r($files); die();
           foreach ($files as $file){
             //  $model->imageFiles ='';
               $model->isNewRecord=true;
               $model->song_id=null;
              // echo $file; die();
               $model->file_path=$file;
             //  print_r($model); die();
               if ($model->save()) {
                   
               }else{
                   print_r($model->errors); die();
               }
            } 
                        
//         if ($model->load(Yii::$app->request->post()) && $model->save()) 
//         {
//             return $this->redirect(['view', 'id' => $model->song_id]);
//         }
        return $this->redirect(['index']);
        }
        //print_r($form_upload); die();
        return $this->render('create', [
            'model' => $model,'form_upload'=>$form_upload
        ]);
    }

    /**
     * Updates an existing TblPrtSongs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->song_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPrtSongs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $details=$this->findModel($id);
        $path='uploads/songs/'.$details->file_path;
        if(file_exists($path)){
            unlink($path);
        }else{
           // echo 'file not found';
        }
        
        
        $details->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPrtSongs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPrtSongs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPrtSongs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
