<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_parties_users".
 *
 * @property int $user_id
 * @property string $email
 * @property string $password
 * @property string $auth_token
 * @property int $is_active
 * @property int $email_verified
 * @property int $user_type
 * @property int $created_by
 * @property string $created_date
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_parties_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'user_type', 'created_by'], 'required'],
            [['user_type', 'created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['email'], 'string', 'max' => 100],
            [['password', 'auth_token'], 'string', 'max' => 250],
            [['is_active', 'email_verified'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'email' => 'Email',
            'password' => 'Password',
            'auth_token' => 'Auth Token',
            'is_active' => 'Is Active',
            'email_verified' => 'Email Verified',
            'user_type' => 'User Type',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
}
