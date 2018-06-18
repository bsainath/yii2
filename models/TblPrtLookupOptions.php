<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_lookup_options".
 *
 * @property int $option_id
 * @property int $lookup_id
 * @property string $option_name
 * @property string $color_code
 * @property int $created_by
 * @property string $created_date
 *
 * @property TblPrtLookupType $lookup
 * @property TblPrtMembers[] $tblPrtMembers
 * @property TblPrtMembers[] $tblPrtMembers0
 */
class TblPrtLookupOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_lookup_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lookup_id', 'option_name', 'created_by'], 'required'],
            [['lookup_id', 'created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['option_name'], 'string', 'max' => 100],
            [['color_code'], 'string', 'max' => 50],
            [['lookup_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPrtLookupType::className(), 'targetAttribute' => ['lookup_id' => 'lookup_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'lookup_id' => 'Lookup ID',
            'option_name' => 'Option Name',
            'color_code' => 'Color Code',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLookup()
    {
        return $this->hasOne(TblPrtLookupType::className(), ['lookup_id' => 'lookup_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPrtMembers()
    {
        return $this->hasMany(TblPrtMembers::className(), ['party_id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPrtMembers0()
    {
        return $this->hasMany(TblPrtMembers::className(), ['profile_type_id' => 'option_id']);
    }
}
