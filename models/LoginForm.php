<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *          
 */
class LoginForm extends Model
{

    public $username;

    public $password;

    public $rememberMe = true;

    private $_user = false;

    /**
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            
            ['username','trim'],
            
            [['password'],'string','min' => 8],
            
            [['username'],'email','message' => 'Valid Email required'],
            
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password')
        ];
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute
     *            the attribute currently being validated
     * @param array $params
     *            the additional name-value pairs given in the rule
     */
   /* public function validatePassword($attribute, $params)
    {
        if (! $this->hasErrors()) {
            $user = $this->getUser();
            
            if (! $user || ! $user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }*/

    public function validatePassword($attribute, $params)
    {
        if (! $this->hasErrors()) {
            $user = $this->getUser();
            // print_r($user); die();
            if (! $user) {
                $this->addError($attribute, 'Incorrect username or password.');
            } else if (!empty($user['msg'])) {
                $this->addError($attribute, $user['msg']);
            } else {
                if ($user->is_verified == 0) {
                    $this->addError($attribute, 'Email Id is not verified, Please verify mail.');
                } else if ($user->is_active == 0) {
                    $this->addError($attribute, 'Account Inactive, Please contact administrator.');
                } else if (! $user->validatePassword($this->password)) {
                    $this->addError($attribute, 'Incorrect password.');
                }
            }
        }//end if
        
    }//end validatePassword()
    
    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            //die('here');
            $this->_user = User::findByUsername($this->username);
        }
        
        return $this->_user;
    }
    
   
}
