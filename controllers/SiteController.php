<?php

namespace app\controllers;

use app\models\TblPrtCities;
use app\models\TblPrtLookupType;
use app\models\TblPrtMembers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use yii\data\Pagination;
use app\models\TblPrtLookupOptions;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout=false;

        $parties= TblPrtLookupType::findOne(['lookup_id'=>2]);

        $profiles= TblPrtLookupType::findOne(['lookup_id'=>1]);

        $members = TblPrtMembers::find()
                    ->joinWith('city')
            ->joinWith('party')
            ->joinWith('profileType');

        $append_where=false;
        if(!empty(Yii::$app->request->get('name'))){

            $members->where( ['like', TblPrtMembers::tableName().'.name', Yii::$app->request->get('name')]);
            $append_where=true;
        }

        if(!empty(Yii::$app->request->get('party'))){

            if($append_where){  $members->andWhere( [ 'party.option_id'=>Yii::$app->request->get('party')]); }else{
                $members->Where( ['party.option_id' => Yii::$app->request->get('party')]);
            }
            $append_where=true;
        }

        if(!empty(Yii::$app->request->get('profile'))){

            if($append_where){  $members->andWhere( [ 'profile.option_id'=> Yii::$app->request->get('profile')]); }else{
                $members->Where( [ 'profile.option_id'=> Yii::$app->request->get('profile')]);
            }
            $append_where=true;
        }

        if(!empty(Yii::$app->request->get('state'))){

            if($append_where){  $members->andWhere( [ TblPrtCities::tableName().'.state_id'=> Yii::$app->request->get('state')]); }else{
                $members->Where( [ TblPrtCities::tableName().'.state_id'=> Yii::$app->request->get('state')]);
            }
           // $where_sql .=' AND tbc.state_id ='.Yii::$app->request->get('state').'';
        }

        $countQuery = clone $members;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>4]);
      

        $data = $members->offset($pages->offset)
            ->limit(4)
            ->all();



            $all_members = TblPrtMembers::find()
            ->joinWith('city')
            ->joinWith('party')
            ->joinWith('profileType')->all();

            return $this->render('index',['parties'=>$parties,'members'=>$data,'profiles'=>$profiles,'all_members'=>$all_members,'pages' => $pages]);
    }

    public function actionParty($id){
        $this->layout=false;

        $party_details=TblPrtLookupOptions::findOne(['option_id'=>$id]);
       
        $parties= TblPrtLookupType::findOne(['lookup_id'=>2]);

        $profiles= TblPrtLookupType::findOne(['lookup_id'=>1]);

        $members = TblPrtMembers::find()
            ->joinWith('city')
            ->joinWith('party')
            ->joinWith('profileType')
        ->where(['party.option_id'=>$id]);

        $append_where=false;
       /* if(!empty(Yii::$app->request->get('name'))){

            $members->where( ['like', TblPrtMembers::tableName().'.name', Yii::$app->request->get('name')]);
            $append_where=true;
        }*/

        if(!empty(Yii::$app->request->get('profile'))){

            if($append_where){  $members->andWhere( ['profile.option_id'=> Yii::$app->request->get('profile')]); }else{
                $members->Where( ['profile.option_id'=>Yii::$app->request->get('profile')]);
            }
            $append_where=true;
        }

        if(!empty(Yii::$app->request->get('state'))){

            if($append_where){  $members->andWhere( [TblPrtCities::tableName().'.state_id'=>Yii::$app->request->get('state')]); }else{
                $members->Where( [TblPrtCities::tableName().'.state_id'=> Yii::$app->request->get('state')]);
            }
        }

        $countQuery = clone $members;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>4]);

  
        $data = $members->offset($pages->offset)
            ->limit(4)
            ->all();

            return $this->render('party',['parties'=>$parties,'members'=>$data,'profiles'=>$profiles,'pages' => $pages,'party_details'=>$party_details]);
    }
    public function actionDetails($id)
    { 
        $this->layout=false;
        
        $members = TblPrtMembers::find()
        ->joinWith('city')
        ->joinWith('party')
        ->joinWith('profileType')
        ->where([TblPrtMembers::tableName().'.member_id'=>$id])->one();
        
        $party_details=TblPrtLookupOptions::findOne(['option_id'=>$members->party_id]);
        
        $parties= TblPrtLookupType::findOne(['lookup_id'=>2]);
        
        $profiles= TblPrtLookupType::findOne(['lookup_id'=>1]);
        
        
       // print_r($party_details); die();
        return $this->render('details',['member'=>$members,'party_details'=>$party_details,'parties'=>$parties,'profiles'=>$profiles]);
    }
    
    public function actionCongress()
    {
        $this->layout=false;
        return $this->render('congress');
    }
    
    

    /**
     * Login action.
     *
     * @return Response|string
     */
    /*public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }*/
    
    public function actionLogin() {
       // $this->layout = 'login-main';
        //die('d'); 
        // check if user identity is already set or not
        if (! Yii::$app->user->isGuest) {
            return $this->redirect ( array ( // redirecting to login page
                '/member'
            ) );
        }
        
        $model = new LoginForm ();
   //     $modelforgotpassword = new ForgotPasswordForm ();
        $modeluser = new User ();
        
        if ($model->load ( Yii::$app->request->post () ) && $model->login ()) {
            $user_id = Yii::$app->user->identity->user_id;
           // echo $user_id; die();
            return $this->redirect ( array ( // redirecting to login page
                '/member'
            ) );
           
        }
        
        
        return $this->render ( 'login', [
            'model' => $model,
          //  'modelforgotpassword' => $modelforgotpassword
        ] );
    }
    

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
