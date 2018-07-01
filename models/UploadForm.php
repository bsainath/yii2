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
    public $imageFiles;
    public $opening_add;
    public $header_add;
    public $top_add;
    public $bottom_add;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['profile_pic','opening_add','header_add','top_add', 'bottom_add'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, PNG, JPEG, JPG, TIF, GIF, BMP'],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 4],
            
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
