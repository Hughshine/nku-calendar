<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InstitutionEvent;

/**
 * InstitutionEventSearch represents the model behind the search form of `common\models\InstitutionEvent`.
 */
class InstitutionEventSearch extends InstitutionEvent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_id', 'ev_adminid', 'ev_number', 'cev_tid', 'ev_maxnumber', 'all_day'], 'integer'],
            [['ev_time', 'ev_name', 'ev_place'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = InstitutionEvent::find();

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
            'ev_id' => $this->ev_id,
            'ev_time' => $this->ev_time,
            'ev_adminid' => $this->ev_adminid,
            'ev_number' => $this->ev_number,
            'cev_tid' => $this->cev_tid,
            'ev_maxnumber' => $this->ev_maxnumber,
            'all_day' => $this->all_day,
        ]);

        $query->andFilterWhere(['like', 'ev_name', $this->ev_name])
            ->andFilterWhere(['like', 'ev_place', $this->ev_place]);

        return $dataProvider;
    }
}
