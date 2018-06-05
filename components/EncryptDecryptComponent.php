<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\controllers\SiteController;

class EncryptDecryptComponent extends Component
{


    /**
     * Encrypt function for user id
     */
    public static function encrytedUser($user_id)
    {

        $encrypt_method = "AES-256-CBC";
        // pls set your unique hashing key
        $secret_key  = 'aca@#$456';
        $secret_iv   = 'aca@#$456123';
        $secret_hash = 'sha256';
        // hash
        $key = hash($secret_hash, $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash($secret_hash, $secret_iv), 0, 16);

        $crypt     = openssl_encrypt($user_id, $encrypt_method, $key, 0, $iv);
        $crypt_url = base64_encode($crypt);

        return $crypt_url;

    }//end encrytedUser()


    public static function decryptUser($user_id)
    {

        $encrypt_method = "AES-256-CBC";
        // pls set your unique hashing key
        $secret_key  = 'aca@#$456';
        $secret_iv   = 'aca@#$456123';
        $secret_hash = 'sha256';
        // hash
        $key = hash($secret_hash, $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash($secret_hash, $secret_iv), 0, 16);

        // decrypt the given text/string/number
        $user = openssl_decrypt(base64_decode($user_id), $encrypt_method, $key, 0, $iv);

        return $user;

    }//end decryptUser()


}//end class
