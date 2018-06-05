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
    public $file;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, PNG, JPEG, JPG, TIF, GIF, BMP'
            ],
        ];

    }//end rules()


}//end class
