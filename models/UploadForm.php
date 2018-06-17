<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $profile_pic;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['profile_pic'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, PNG, JPEG, JPG, TIF, GIF, BMP'
            ],
        ];

    }//end rules()

   /* public function upload()
    {
        if ($this->validate()) {
            $this->profile_pic->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }*/

}//end class
