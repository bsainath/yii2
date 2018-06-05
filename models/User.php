<?php
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tbl_prt_users".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $authkey
 * @property string $password_reset_token
 * @property string $accessToken
 * @property integer $usertype
 * @property integer $is_verified
 * @property integer $is_active
 * @property string $last_login
 * @property string $created_date
 * @property integer $created_by
 * @property string $modified_date
 * @property integer $modified_by
 */
class User extends ActiveRecord implements IdentityInterface
{

    const STATUS_NO = 0;

    const STATUS_YES = 1;

    const ADMIN = 'ADMIN';

    const FIRM = 'FIRM';

    const CLIENT = 'CLIENT';

    const SuperAdmin = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{tbl_prt_users}}';
    }
 // end tableName()
    
    /**
     * @inheritdoc
     */
    /*
     * public function behaviors() {
     * return [
     * TimestampBehavior::className ()
     * ];
     * }
     */
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'username',
                    'usertype',
                    'created_date',
                    'created_by'
                ],
                'required'
            ],
            [
                [
                    'is_active',
                    'is_verified',
                    'usertype',
                    'created_by',
                    'modified_by'
                ],
                'integer'
            ],
            [
                [
                    'username',
                    'authkey',
                    'accessToken'
                ],
                'string',
                'max' => 50
            ],
            [
                [
                    'password_reset_token'
                ],
                'string',
                'max' => 255
            ],
            [
                'username',
                'trim'
            ],
            [
                'username',
                'email',
                'message' => 'Email Address is not a valid.'
            ],
            [
                [
                    'username'
                ],
                'required',
                'message' => 'Username / Email Id cannot be blank.'
            ],
            // ['username', 'unique', 'targetAttribute' => ['username', 'usertype'], 'message' => 'Username already taken for this Usertype'],
            [
                'username',
                'unique',
                'message' => 'User is already registered, please use a different email address.'
            ],
            [
                [
                    'password_reset_token'
                ],
                'unique'
            ],
            [
                [
                    'last_login',
                    'created_date',
                    'modified_date'
                ],
                'safe'
            ],
            [
                [
                    'is_active'
                ],
                'default',
                'value' => self::STATUS_NO
            ],
            [
                [
                    'is_verified'
                ],
                'default',
                'value' => self::STATUS_NO
            ],
            [
                [
                    'is_active',
                    'is_verified'
                ],
                'in',
                'range' => [
                    self::STATUS_YES,
                    self::STATUS_NO
                ]
            ]
        ];
    }
 // end rules()
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Email Address',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'password_reset_token' => 'Password Reset Token',
            'accessToken' => 'Access Token',
            'usertype' => 'Usertype',
            'is_verified' => 'Is Verified',
            'is_active' => 'Is Active',
            'last_login' => 'Last Login',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'modified_date' => 'Modified Date',
            'modified_by' => 'Modified By'
        ];
    }
 // end attributeLabels()
    public function getUsertype()
    {
        return $this->usertype;
    }
 // end getUsertype()
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne([
            'user_id' => $id
        ]);
    }
 // end findIdentity()
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne([
            'accessToken' => $token
        ]);
    }
 // end findIdentityByAccessToken()
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static null
     */
    public static function findByUsername($username)
    {
        return static::findOne([
            'username' => $username,
            'is_active' => self::STATUS_YES
        ]);
    }
 // end findByUsername()
    
    /**
     * Finds user by email
     *
     * @param string $email
     * @return static null
     */
    public static function findByEmail($email)
    {
        return static::findOne([
            'email' => $email
        ]);
    }
 // end findByEmail()
    
    /**
     * Finds user by password reset token
     *
     * @param string $token
     *            password reset token
     * @return static null
     */
    public static function findByPasswordResetToken($token)
    {
        if (! static::isPasswordResetTokenValid($token)) {
            return null;
        }
        
        return static::findOne([
            'password_reset_token' => $token,
            'is_active' => self::STATUS_YES
        ]);
    }
 // end findByPasswordResetToken()
    
    /**
     * Finds user by auth key
     *
     * @param string $token
     *            auth key token
     * @return static null
     */
    public static function findByAuthKey($token)
    {
        return static::findOne([
            'authkey' => $token
        ]);
    }
 // end findByAuthKey()
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token
     *            password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        
        $timestamp = (int) substr($token, (strrpos($token, '_') + 1));
        
        $expire = Yii::$app->params['passwordResetTokenExpire'];
        return ($timestamp + $expire) >= time();
    }
 // end isPasswordResetTokenValid()
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
 // end getId()
    
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }
 // end getAuthKey()
    
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
 // end validateAuthKey()
    
    /**
     * Validates password
     *
     * @param string $password
     *            password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
 // end validatePassword()
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
 // end setPassword()
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->authkey = Yii::$app->security->generateRandomString() . '_' . time();
    }
 // end generateAuthKey()
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
 // end generatePasswordResetToken()
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
 // end removePasswordResetToken()
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authkey = \Yii::$app->security->generateRandomString() . '_' . time();
            }
            
            return true;
        }
        
        return false;
    } // end beforeSave()
}//end class
