<?php

namespace app\controllers;

use yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use app\models\AdminUsers;

class BaseController extends Controller {
	
	/**
	 * @inheritdoc
	 */

	public function init() {
		
		
		
	   // print_r(\Yii::$app->user->identity); die();
		
		if(!empty(\Yii::$app->user->identity->usertype)){
		    
		   // print_r(\Yii::$app->session['userdata']); die(); 
		  
		    if(!empty(\Yii::$app->session['userdata'])){
		        $data=AdminUsers::findOne(\Yii::$app->user->identity->user_id);
		        
		        
		        \Yii::$app->session['userdata']=$data;
		        
		    }
		    
		
		
	}else
	{
	    //die('ds');
	    //print_r(\Yii::$app->user->identity); die();
		return $this->redirect ( array ( // redirecting to login page
							'/site'
					) );
	}
	
	die('ds');
		$session = \Yii::$app->session;
		if(empty($session['logged_user_fullname'])){
			
			
			$userrights=array();
			$logged_user_id = Yii::$app->user->identity->user_id;
			$user_type = Yii::$app->user->identity->usertype;
			
			
			/*switch ($user_type){
				case 1:
					
					$userdetailModel=AdminUsers::findOne(['user_id'=>$logged_user_id]);
					//$admin_users=AdminUserRights::findAll(['admin_id'=>$admin_id->admin_id]);
					$sql="SELECT rm.right_id FROM tbl_sir_admin_user_rights aur Left Join tbl_sir_rights_master rm on aur.right_id=rm.right_id WHERE rm.user_type=1 and aur.admin_id=$userdetailModel->admin_id";
					$connection = \yii::$app->db;
					$model = $connection->createCommand($sql);
					$userrights= $model->queryAll();
					
					$profile_pic = $userdetailModel->profile_pic;
					if (! empty ( $profile_pic )) {
						$session ['profile_pic'] = '/images/admin_user/' . $profile_pic;
					} else {
						$session ['profile_pic'] = '/images/defaultuserimg.png';
					}
					// $full_name = $userdetailModel->first_name.' '.$userdetailModel->last_name;
					$full_name = $userdetailModel->first_name;
					$session ['logged_user_fullname'] = $full_name;
					$session ['profile_logo'] = '/images/logo/benefits.png';
					$currentuserrights=array('ADMIN');
					
					break;
					
				
					
					
			}*/
			
		
			
		}
		
		
			
	
	
	}
	
	
}
