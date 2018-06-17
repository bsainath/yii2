<?php

namespace app\controllers;

use Yii;
use app\models\TblPrtMembers;
use app\models\TblPrtMembersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * MemberController implements the CRUD actions for TblPrtMembers model.
 */
class MemberController extends BaseController
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
     * Lists all TblPrtMembers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPrtMembersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPrtMembers model.
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
     * Creates a new TblPrtMembers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPrtMembers();

        if ($model->load(Yii::$app->request->post()) ) {
            $personel_info = Yii::$app->request->post('info');
            $model->personel_info=serialize(json_encode($personel_info));

            $personel_int = Yii::$app->request->post('int');
            $model->personel_interest=serialize(json_encode($personel_int));

            $model->created_by=1;

            if(Yii::$app->request->post())

                $model_upload = new UploadForm();
            $model_upload->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
            //print_r($model_upload->profile_pic); die();
            if (!empty($model_upload->profile_pic)) {


                $model->profile_pic=str_replace(' ','_',$model_upload->profile_pic->baseName).'profile.'.$model_upload->profile_pic->extension;
                if ($model_upload->profile_pic && $model_upload->validate()) {
                    $model_upload->profile_pic->saveAs('uploads/' . $model->profile_pic);
                }
            }

           // print_r(); die();

            if($model->save()){

            }else{
                print_r($model->errors); die();
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblPrtMembers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $per_info_data=json_decode(unserialize($model->personel_info),true);
        //print_r($per_info_data); die();
        if ($model->load(Yii::$app->request->post())) {

            $personel_info = Yii::$app->request->post('info');
            $model->personel_info=serialize(json_encode($personel_info));



            $personel_int = Yii::$app->request->post('int');
            $model->personel_interest=serialize(json_encode($personel_int));




            $model_upload = new UploadForm();
            $model_upload->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
            //print_r($model_upload->profile_pic); die();
            if (!empty($model_upload->profile_pic)) {


                $model->profile_pic=str_replace(' ','_',$model_upload->profile_pic->baseName).'profile.'.$model_upload->profile_pic->extension;
                if ($model_upload->profile_pic && $model_upload->validate()) {
                    $model_upload->profile_pic->saveAs('uploads/' . $model->profile_pic);
                }
            }


           // print_r($personel_int); die();
            if($model->save()){

            }else{
                print_r($model->errors); die();
            }
            return $this->redirect(['view', 'id' => $model->member_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPrtMembers model.
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
     * Finds the TblPrtMembers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPrtMembers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPrtMembers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
