<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_states".
 *
 * @property int $state_id
 * @property string $state_name
 * @property int $country_id
 */
class TblPrtStates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'required'],
            [['country_id'], 'integer'],
            [['state_name'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state_name' => 'State Name',
            'country_id' => 'Country ID',
        ];
    }
}
