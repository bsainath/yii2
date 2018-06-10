<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPrtMembers;

/**
 * TblPrtMembersSearch represents the model behind the search form of `app\models\TblPrtMembers`.
 */
class TblPrtMembersSearch extends TblPrtMembers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'party_id', 'city_id', 'profile_type_id', 'created_by', 'modified_by'], 'integer'],
            [['name', 'constituency', 'district', 'profile_pic', 'personel_info', 'personel_interest', 'other_info', 'created_date', 'modified_date'], 'safe'],
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
        $query = TblPrtMembers::find();

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
            'member_id' => $this->member_id,
            'party_id' => $this->party_id,
            'city_id' => $this->city_id,
            'profile_type_id' => $this->profile_type_id,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_by' => $this->modified_by,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'constituency', $this->constituency])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'profile_pic', $this->profile_pic])
            ->andFilterWhere(['like', 'personel_info', $this->personel_info])
            ->andFilterWhere(['like', 'personel_interest', $this->personel_interest])
            ->andFilterWhere(['like', 'other_info', $this->other_info]);

        return $dataProvider;
    }
}
