<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_lookup_type".
 *
 * @property int $lookup_id
 * @property string $look_up_name
 * @property int $is_active
 * @property int $created_by
 * @property string $created_date
 *
 * @property TblPrtLookupOptions[] $tblPrtLookupOptions
 */
class TblPrtLookupType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_lookup_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['look_up_name', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['look_up_name'], 'string', 'max' => 100],
            [['is_active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lookup_id' => 'Lookup ID',
            'look_up_name' => 'Look Up Name',
            'is_active' => 'Is Active',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPrtLookupOptions()
    {
        return $this->hasMany(TblPrtLookupOptions::className(), ['lookup_id' => 'lookup_id']);
    }
}
