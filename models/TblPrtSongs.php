<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_songs".
 *
 * @property int $song_id
 * @property int $party_id
 * @property string $file_path
 * @property string $created_date
 *
 * @property TblPrtLookupOptions $party
 */
class TblPrtSongs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_songs';
    }

    public $imageFiles;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id'], 'required'],
            [['party_id'], 'integer'],
            [['created_date'], 'safe'],
            [['file_path'], 'string', 'max' => 100],
            [['party_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPrtLookupOptions::className(), 'targetAttribute' => ['party_id' => 'option_id']],
            [['imageFiles'], 'file', 'skipOnEmpty' => false,  'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'song_id' => 'Song ID',
            'party_id' => 'Party',
            'file_path' => 'File Path',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParty()
    {
        return $this->hasOne(TblPrtLookupOptions::className(), ['option_id' => 'party_id']);
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $file_path=array();
         //   print_r($this->imageFiles); die();
            foreach ($this->imageFiles as $file) {
                $file_name=str_replace(' ', '_', $file->baseName) .'_'.$this->party_id.mt_rand(1,1000). '.' . $file->extension;
                $file->saveAs('uploads/songs/' .$file_name );
                array_push($file_path, $file_name);
            }
            return $file_path;
        } else {
            print_r($this->errors); 
            die('ok');
            return false;
        }
    }
}
