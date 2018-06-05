<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

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
        return $this->render('index');
    }
    
    public function actionBjp()
    { 
        $this->layout=false;
        return $this->render('bjp');
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
