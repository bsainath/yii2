<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prt_news".
 *
 * @property int $news_id
 * @property string $news_title
 * @property string $news_description
 * @property int $news_type 1=>political,2=>movies
 * @property string $created_date
 */
class TblPrtNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_prt_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_title', 'news_description'], 'required'],
            [['news_type'], 'integer'],
            [['created_date'], 'safe'],
            [['news_title'], 'string', 'max' => 1000],
            [['news_description'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'news_title' => 'News Title',
            'news_description' => 'News Description',
            'news_type' => 'News Type',
            'created_date' => 'Created Date',
        ];
    }
}
