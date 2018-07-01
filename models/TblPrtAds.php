<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_ads".
 *
 * @property int $add_id
 * @property string $opening_add
 * @property string $header_add
 * @property string $top_add
 * @property string $bottom_add
 * @property int $created_by
 * @property string $created_date
 */
class TblPrtAds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['opening_add', 'header_add', 'top_add', 'bottom_add'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'add_id' => 'Add ID',
            'opening_add' => 'Opening Add',
            'header_add' => 'Header Add',
            'top_add' => 'Top Add',
            'bottom_add' => 'Bottom Add',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
}
