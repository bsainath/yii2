<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_members".
 *
 * @property int $member_id
 * @property string $name
 * @property int $party_id
 * @property int $city_id
 * @property string $constituency
 * @property int $profile_type_id
 * @property string $district
 * @property string $profile_pic
 * @property string $personel_info
 * @property string $personel_interest
 * @property string $other_info
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 *
 * @property TblPrtCities $city
 * @property TblPrtLookupOptions $party
 * @property TblPrtLookupOptions $profileType
 */
class TblPrtMembers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'party_id', 'city_id', 'profile_type_id', 'created_by'], 'required'],
            [['party_id', 'city_id', 'profile_type_id', 'created_by', 'modified_by'], 'integer'],
            [['personel_info', 'personel_interest'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['constituency', 'district'], 'string', 'max' => 50],
            [['profile_pic'], 'string', 'max' => 150],
            [['other_info'], 'string', 'max' => 500],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPrtCities::className(), 'targetAttribute' => ['city_id' => 'city_id']],
            [['party_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPrtLookupOptions::className(), 'targetAttribute' => ['party_id' => 'option_id']],
            [['profile_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPrtLookupOptions::className(), 'targetAttribute' => ['profile_type_id' => 'option_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'name' => 'Name',
            'party_id' => 'Party ID',
            'city_id' => 'City ID',
            'constituency' => 'Constituency',
            'profile_type_id' => 'Profile Type ID',
            'district' => 'District',
            'profile_pic' => 'Profile Pic',
            'personel_info' => 'Personel Info',
            'personel_interest' => 'Personel Interest',
            'other_info' => 'Other Info',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(TblPrtCities::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParty()
    {
        return $this->hasOne(TblPrtLookupOptions::className(), ['option_id' => 'party_id'])->from(['party'=>TblPrtLookupOptions::tableName()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfileType()
    {
        return $this->hasOne(TblPrtLookupOptions::className(), ['option_id' => 'profile_type_id'])->from(['profile'=>TblPrtLookupOptions::tableName()]);;
    }
}
