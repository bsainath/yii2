<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPrtNews;

/**
 * TblPrtNewsSearch represents the model behind the search form of `app\models\TblPrtNews`.
 */
class TblPrtNewsSearch extends TblPrtNews
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'news_type'], 'integer'],
            [['news_title', 'news_description', 'created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblPrtNews::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'news_id' => $this->news_id,
            'news_type' => $this->news_type,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'news_title', $this->news_title])
            ->andFilterWhere(['like', 'news_description', $this->news_description]);

        return $dataProvider;
    }
}
