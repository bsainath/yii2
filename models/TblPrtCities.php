<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_cities".
 *
 * @property int $city_id
 * @property string $city_name
 * @property int $state_id
 * @property string $state_name
 *
 * @property TblPrtMembers[] $tblPrtMembers
 */
class TblPrtCities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_name', 'state_id', 'state_name'], 'required'],
            [['state_id'], 'integer'],
            [['city_name', 'state_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city_name' => 'City Name',
            'state_id' => 'State ID',
            'state_name' => 'State Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPrtMembers()
    {
        return $this->hasMany(TblPrtMembers::className(), ['city_id' => 'city_id']);
    }
}
