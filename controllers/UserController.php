<?php

namespace app\controllers;

use yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;

use app\components\AccessRuleComponent;
use yii\filters\VerbFilter;

use yii\db\Expression;


use app\components\EncryptDecryptComponent;
use app\models\AdminUsers;
use app\models\UploadForm;

use yii\web\UploadedFile;
use yii\web\Response;

use yii\helpers\ArrayHelper;

use yii\helpers\FileHelper;



class UserController extends BaseController
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRuleComponent::className()
                ],
                'only' => [
                    
                    'adminuser'
                    

                ],
                'rules' => [
                
                    [
                        'actions' => [

                            'adminuser'
                        ],
                        'allow' => true,
                        'roles' => ['@',1]
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => []
            ]
        ];

    }//end behaviors()


   // public $layout = 'dashboard_layout';


    public function actionAdminuser()
    {
        \Yii::$app->view->title = \Yii::$app->params['page_title'].' | Add User';

        $currentuserrights = [];
        $model_admin_users = new AdminUsers();
        $model_users       = new User();
        $picmodel          = new UploadForm();
       // $adminrights       = new AdminUserRights();
        $logged_id         = Yii::$app->user->identity->user_id;

       /* $rightslist = RightsMaster::find()->where(
            [
                'user_type' => 1
            ]
        )->all();*/

        $admin_id = AdminUsers::findOne(['user_id' => $logged_id]);

      /*  $sql        = "SELECT rm.right_id FROM tbl_sir_admin_user_rights aur Left Join tbl_sir_rights_master rm on aur.right_id=rm.right_id WHERE rm.user_type=1 and aur.admin_id=$admin_id->admin_id";
        $connection = \yii::$app->db;
        $model      = $connection->createCommand($sql);
        // print_r($model); die();
        $userrights = $model->queryAll();

        foreach ($userrights as $userright) {
            array_push($currentuserrights, $userright['right_id']);
        }

        if (! empty(\Yii::$app->request->post())) {
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                $model_users->username         = \Yii::$app->request->post('User')['username'];
                $model_admin_users->attributes = \Yii::$app->request->post('AdminUsers');

                $model_users->usertype     = 1;
                $model_users->is_verified  = 0;
                $model_users->is_active    = 0;
                $model_users->created_by   = Yii::$app->user->identity->user_id;
                $model_users->created_date = date('Y-m-d h:i:s');

                if ($model_users->save()) {
                    $user_id = $model_users->user_id;

                    $model_admin_users->user_id      = $user_id;
                    $model_admin_users->created_by   = Yii::$app->user->identity->user_id;
                    $model_admin_users->created_date = date('Y-m-d h:i:s');

                    // image upload
                    if (Yii::$app->request->isPost) {
                        $picmodel->file = UploadedFile::getInstance($model_admin_users, 'profile_pic');

                        if (! empty($picmodel->file) && $picmodel->validate()) {
                            $pic_name = time().'_'.$user_id.'.'.$picmodel->file->extension;

                            // is_dir - tells whether the filename is a directory
                            if (! is_dir('images/admin_user')) {
                                // mkdir - tells that need to create a directory
                                mkdir('images/admin_user');
                            }

                            $picmodel->file->saveAs('images/admin_user/'.$pic_name);

                            $model_admin_users->profile_pic = $pic_name;
                        }
                    }

                    if ($model_admin_users->save()) {
                        $admin_id     = $model_admin_users->admin_id;
                        $permissions  = \Yii::$app->request->post('AdminUserRights');
                        $rights_count = 0;
                        $total_permissions_count = count($permissions);

                        if (! empty($permissions)) {
                            foreach ($permissions as $permission => $value) {
                                $adminrights->admin_id      = $admin_id;
                                $adminrights->right_id      = $value;
                                $adminrights->created_by    = Yii::$app->user->identity->user_id;
                                $adminrights->created_date  = date('Y-m-d h:i:s');
                                $adminrights->isNewRecord   = true;
                                $adminrights->user_right_id = null;

                                if ($adminrights->save()) {
                                    $rights_count ++;
                                } else {
                                    throw new \Exception('Unable to save permissions for admin user.');
                                }
                            }
                        } else {
                            throw new \Exception('Please assign at least one Access Privilege for user creation.');
                        }//end if
 


                        // check if all permissions is saved
                        if ($total_permissions_count == $rights_count) {
                            $transaction->commit();
                            $to   = $model_users->username;
                            $from = \Yii::$app->params['from_mail'];
                            $name = $model_admin_users->first_name.' '.$model_admin_users->last_name;
                            // creating link
                            $link = \Yii::$app->urlManager->createAbsoluteUrl('/verify-mail').'?authkey='.$model_users->authkey.'&email='.$model_users->username;

                            // send re-verifcation mail
                            $mail_result = \Yii::$app->customMail->verifymail($to, $from, $name, $link);
 

                            \Yii::$app->session->setFlash('success', 'Admin ('.$name.') added succesfully, a verification mail has been sent.');

                            return $this->redirect(
                                ['/search?key='.$model_admin_users->first_name]
                            );
                        }
                    }//end if
                }//end if
            } catch (\Exception $e) {
                $transaction->rollBack();
                $msg = $e->getMessage();
                \Yii::$app->session->setFlash('error', $msg);
            }//end try
        }//end if
*/
        return $this->render(
            'adminuser',
            [
            //    'model_admin_users' => $model_admin_users,
            //    'model_users'       => $model_users,
             //   'adminrights'       => $adminrights,
              //  'rightslist'        => $rightslist,
             //   'currentuserrights' => $currentuserrights,
            ]
        );

    }//end actionAdminuser()


    // for modal pop up for admin
    /*public function actionUpdateadminuser($adminId)
    {
        $model     = new AdminUsers();
        $modelUser = new User();
        // $encrypt_component = new EncryptDecryptComponent ();
        $firm_rights           = new AdminUserRights();
        $encrypt_admin_user_id = '';
        $adminuserRights       = [];
        $logged_id = Yii::$app->user->identity->user_id;
        $admin_id  = AdminUsers::findOne(['user_id' => $logged_id]);

        $rightslist = RightsMaster::find()->where(
            [
                'user_type' => 1
            ]
        )->all();

        $sql        = "SELECT rm.right_id FROM tbl_sir_admin_user_rights aur Left Join tbl_sir_rights_master rm on aur.right_id=rm.right_id WHERE rm.user_type=1 and aur.admin_id=$admin_id->admin_id";
        $connection = \yii::$app->db;
        $model      = $connection->createCommand($sql);
        // print_r($model); die();
        $userrights        = $model->queryAll();
        $currentuserrights = [];
        foreach ($userrights as $userright) {
            array_push($currentuserrights, $userright['right_id']);
        }

        if (! empty($adminId)) {
            $encrypt_admin_user_id = $adminId;
            $admin_user_id         = EncryptDecryptComponent::decryptUser($adminId);
            $model           = AdminUsers::find()->where(
                [
                    'admin_id' => $admin_user_id
                ]
            )->One();
            $modelUser       = User::find()->where(
                [
                    'user_id' => $model->user_id
                ]
            )->One();
            $adminuserRights = ArrayHelper::getColumn(
                AdminUserRights::find()->select('right_id')->where(
                    [
                        'admin_id' => $admin_user_id
                    ]
                )->asArray()->All(),
                'right_id'
            );
            ;
        }//end if

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax(
                '_updateadminuser',
                [
                    'model'                 => $model,
                    'modelUser'             => $modelUser,
                    'encrypt_admin_user_id' => $encrypt_admin_user_id,
                    'rightslist'            => $rightslist,
                    'adminuserRights'       => $adminuserRights,
                    'currentuserrights'     => $currentuserrights,
                ]
            );
        } else {
            return $this->render(
                '_updateadminuser',
                [
                    'model'                 => $model,
                    'modelUser'             => $modelUser,
                    'encrypt_admin_user_id' => $encrypt_admin_user_id,
                    'rightslist'            => $rightslist,
                    'adminuserRights'       => $adminuserRights,
                    'currentuserrights'     => $currentuserrights,
                ]
            );
        }//end if

    }//end actionUpdateadminuser()


    // for update admin user
    // admin save
    public function actionSaveupdateadminuser()
    {
        $model_admin_users = new AdminUsers();
        $model_users       = new User();
        $picmodel          = new UploadForm();
        $adminrights       = new AdminUserRights();
        $email_changed     = false;
        $oldemail          = '';
        $newemail          = '';
        $user_id           = '' ;
        $profile_pic       = '';

        $rightslist = RightsMaster::find()->where(
            [
                'user_type' => 1
            ]
        )->all();
        if (! empty($_POST['AdminUsers'])) {
            // getting the firm user id
            $admin_user_id = EncryptDecryptComponent::decryptUser($_POST['SupportVariable']['admin_user_id']);

            // getting firm user details
            $model       = AdminUsers::find()->joinWith('user')->where(
                [
                    'admin_id' => $admin_user_id
                ]
            )->One();
            $profile_pic = $model->profile_pic;

            $model_users = User::find()->where(
                [
                    'user_id' => $model->user_id
                ]
            )->One();
            $email_id    = $model_users->username;
            // begining the db transaction
            $transaction = \Yii::$app->db->beginTransaction();

            try {
                $model->attributes       = $_POST['AdminUsers'];
                $model_users->attributes = $_POST['User'];
                $oldemail  = $email_id;
                $newemail  = $_POST['User']['username'];
                $logged_id = Yii::$app->user->identity->user_id;
                $user_id   = $model->user_id ;

               
                if ($model_users->username != $email_id) {
                    $model_users->is_verified   = 0;
                    $model_users->modified_by   = \Yii::$app->user->identity->user_id;
                    $model_users->modified_date = date('Y-m-d H:i:s');
                    $email_changed = true;
                }

                if ($model_users->save()) {
                    // now saving data in firm users table
                    $model->modified_by   = \Yii::$app->user->identity->user_id;
                    $model->modified_date = date('Y-m-d H:i:s');

                    $picmodel->file = UploadedFile::getInstance($model, 'profile_pic');

                    if (! empty($picmodel->file) && $picmodel->validate()) {
                        $pic_name = time().'_'.$model_users->user_id.'.'.$picmodel->file->extension;

                        // is_dir - tells whether the filename is a directory
                        if (! is_dir('images/admin_user')) {
                            // mkdir - tells that need to create a directory
                            mkdir('images/admin_user');
                        }

                        $picmodel->file->saveAs('images/admin_user/'.$pic_name);

                        $model->profile_pic = $pic_name;
                    } else {
                        $model->profile_pic = $profile_pic;
                    }

                    if ($model->save()) {
                        $admin_user_id = $model->admin_id;

                        $permissions = \Yii::$app->request->post('AdminUserRights');
                        // print_R($permissions);die();
                        $rights_count            = 0;
                        $total_permissions_count = count($permissions);

                        AdminUserRights::deleteAll(
                            'admin_id = :admin_id',
                            [':admin_id' => $admin_user_id]
                        );

                        if (! empty($permissions)) {
                            foreach ($permissions as $permission => $value) {
                                $adminrights->admin_id      = $admin_user_id;
                                $adminrights->right_id      = $value;
                                $adminrights->created_by    = Yii::$app->user->identity->user_id;
                                $adminrights->created_date  = date('Y-m-d h:i:s');
                                $adminrights->isNewRecord   = true;
                                $adminrights->user_right_id = null;

                                if ($adminrights->save()) {
                                    $rights_count ++;
                                } else {
                                    throw new \Exception('Unable to save permissions for user.');
                                }
                            }
                        } else {
                            throw new \Exception('Please assign at least one Access Privilege.');
                        }//end if
                        // check for email change
                        if ($email_changed) {
                            $emailchange = $this->emailchanged($newemail, $oldemail, $user_id, $logged_id);
                            $to          = $model_users->username;
                            $from        = \Yii::$app->params['from_mail'];
                            $name        = $model->first_name.' '.$model->last_name;
                            // creating link
                            $link = \Yii::$app->urlManager->createAbsoluteUrl('/verify-mail').'?authkey='.$model_users->authkey.'&email='.$model_users->username;

                            // send re-verifcation mail
                            $mail_result = \Yii::$app->customMail->verifymail($to, $from, $name, $link);

                            $success = 'Profile updated successfully, a verification mail has been sent please verify it.';
                        }

                        // check if all permissions is saved
                        if ($total_permissions_count == $rights_count) {
                            // form inputs are valid, do something here
                            $transaction->commit();

                            $success = 'success';
                            Yii::$app->response->format = trim(Response::FORMAT_JSON);
                            return $success;
                        }
                    } else {
                        $error = \yii\widgets\ActiveForm::validate($model);
                        Yii::$app->response->format = trim(Response::FORMAT_JSON);
                        return $error;
                    }//end if
                } else {
                    $error = \yii\widgets\ActiveForm::validate($model_users);
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return $error;
                }//end if
            } catch (\Exception $e) {
                $msg = $e->getMessage();
                Yii::$app->response->format = trim(Response::FORMAT_JSON);
                return $msg;
            }//end try
        }//end if

    }//end actionSaveupdateadminuser()

   
    protected function emailchanged($newemail, $oldemail, $user_id, $logged_id)
    {
        // begining the db transaction
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $model_email_change = new UserEmailChange();
            $model_email_change->previous_email = $oldemail;
            $model_email_change->new_email      = $newemail;
            $model_email_change->user_id        = $user_id;
            $model_email_change->updated_by     = $logged_id;

            if ($model_email_change->save()) {
                $transaction->commit();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            $transaction->rollBack();

            Yii::$app->response->format = trim(Response::FORMAT_JSON);
            return false;
        }

    }//end emailchanged() 
    
    */


}//end class
