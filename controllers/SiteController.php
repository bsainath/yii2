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



       // $sql="SELECT tbc.*,tblp.option_name as party,tbc.city_name as city_name,tblpt.option_name as profile_type  FROM tbl_prt_members tbm LEFT JOIN tbl_prt_cities tbc ON tbc.city_id=tbm.city_id
        //      LEFT JOIN tbl_prt_lookup_options tblp ON tblp.option_id=tbm.party_id LEFT JOIN tbl_prt_lookup_options tblpt ON tblpt.option_id=tbm.profile_type_id";

//$where_sql=' WHERE tbm.member_id!=""';
$append_where=false;
        if(!empty(Yii::$app->request->get('name'))){

           // $where_sql .=' AND tbc.name like %'.Yii::$app->request->get('name').'%';
            $members->where( ['like', TblPrtMembers::tableName().'.name', Yii::$app->request->get('name')]);
        }

        if(!empty(Yii::$app->request->get('party'))){

            if($append_where){  $members->andWhere( [ 'party.option_id'=>Yii::$app->request->get('party')]); }else{
                $members->Where( ['party.option_id' => Yii::$app->request->get('party')]);
            }
          //  $where_sql .=' AND tblp.option_id ='.Yii::$app->request->get('party').'';
            $append_where=true;
        }

        if(!empty(Yii::$app->request->get('profile'))){

            if($append_where){  $members->andWhere( [ 'profile.option_id'=> Yii::$app->request->get('profile')]); }else{
                $members->Where( [ 'profile.option_id'=> Yii::$app->request->get('profile')]);
            }
            //$where_sql .=' AND tblpt.option_id ='.Yii::$app->request->get('profile').'';
            $append_where=true;
        }

        if(!empty(Yii::$app->request->get('state'))){

            if($append_where){  $members->andWhere( [ TblPrtCities::tableName().'.state_id'=> Yii::$app->request->get('state')]); }else{
                $members->Where( [ TblPrtCities::tableName().'.state_id'=> Yii::$app->request->get('state')]);
            }
           // $where_sql .=' AND tbc.state_id ='.Yii::$app->request->get('state').'';
        }

        $countQuery = clone $members;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>1]);
       // $pages->limit=1;

        /*if(!empty(Yii::$app->request->get('page')) && Yii::$app->request->get('page')>1 ){
            $members->limit(4)->offset((Yii::$app->request->get('page')-1));
            //$where_sql .='  LIMIT '.(Yii::$app->request->get('page')-1).',4';
        }else{

            $members->limit(4);
        }*/

        $data = $members->offset($pages->offset)
            ->limit(1)
            ->all();

       //$data= $members->all();

        //$members = TblPrtMembers::findBySql($sql.$where_sql)->all()->asArray();
       // print_r($pages); die();
        return $this->render('index',['parties'=>$parties,'members'=>$data,'profiles'=>$profiles,'pages' => $pages]);
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
        if(!empty(Yii::$app->request->get('name'))){

            $members->where( ['like', TblPrtMembers::tableName().'.name', Yii::$app->request->get('name')]);
        }

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
        //print_r($members); die();
        return $this->render('details',['member'=>$members]);
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
                '/site'
            ) );
        }
        
        $model = new LoginForm ();
   //     $modelforgotpassword = new ForgotPasswordForm ();
        $modeluser = new User ();
        
        if ($model->load ( Yii::$app->request->post () ) && $model->login ()) {
            $user_id = Yii::$app->user->identity->user_id;
           // echo $user_id; die();
            return $this->goHome();
           
        }
        
       /* if ($modelforgotpassword->load ( Yii::$app->request->post () ) && $modelforgotpassword->validate ()) {
            
            $arrresult = array ();
            try {
                // find by username
                $user_details = $modeluser->findByUsername ( $modelforgotpassword->username );
                
                if (! empty ( $user_details )) {
                    
                    // Setting password reset token
                    $user_details->generatePasswordResetToken ();
                    
                    if ($user_details->save ()) {
                        
                        $password_reset_token = $user_details->password_reset_token;
                        
                        $to = $modelforgotpassword->username;
                        $from = \Yii::$app->params ['from_mail'];
                        
                        
                        // check usertype
                        switch ($user_details->usertype) {
                           
                            case '1' :
                                $userdetailModel = AdminUsers::find ()->where ( [
                                'user_id' => $user_details->user_id
                                ] )->One ();
                                break;
                                
                            case '2' :
                                $userdetailModel = FirmUsers::find ()->where ( [
                                'user_id' => $user_details->user_id
                                ] )->One ();
                                break;
                                
                            case '3' :
                                $userdetailModel = ClientUser::find ()->where ( [
                                'user_id' => $user_details->user_id
                                ] )->One ();
                                break;
                        }
                        
                        if (! empty ( $userdetailModel )) {
                            $name = $userdetailModel->first_name . ' ' . $userdetailModel->last_name;
                        } else {
                            $name = $to;
                        }
                        
                        // creating link
                        $link = \Yii::$app->urlManager->createAbsoluteUrl ( '/forgot-password' ) . '?token=' . $password_reset_token . '&email=' . $modelforgotpassword->username;
                        
                        // send forgot password mail
                        $mail_result = \Yii::$app->customMail->forgotpasswordmail ( $to, $from, $name, $link );
                        
                        if (! empty ( $mail_result )) {
                            \Yii::$app->session->setFlash ( 'success', 'Password reset link has been sent to your email address. Please follow the instructions in the email' );
                        } else {
                            \Yii::$app->session->setFlash ( 'error', 'Some error occurred while sending mail' );
                        }
                    }
                } else {
                    \Yii::$app->session->setFlash ( 'error', 'There was an error occurred, please contact administrator.' );
                }
            } catch ( \Exception $e ) {
                $msg = $e->getMessage ();
                \Yii::$app->session->setFlash ( 'error', $msg );
            }
        }*/
        
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
