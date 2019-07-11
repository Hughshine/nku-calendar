<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Event;

/**
 * EventSearch represents the model behind the search form of `common\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_time', 'ev_title', 'ev_place', 'ev_content'], 'safe'],
            [['ev_id', 'ev_adminid', 'ev_maxnumber', 'ev_number'], 'integer'],
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
        $query = Event::find();

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
            'ev_time' => $this->ev_time,
            'ev_id' => $this->ev_id,
            'ev_adminid' => $this->ev_adminid,
            'ev_maxnumber' => $this->ev_maxnumber,
            'ev_number' => $this->ev_number,
        ]);

        $query->andFilterWhere(['like', 'ev_title', $this->ev_title])
            ->andFilterWhere(['like', 'ev_place', $this->ev_place])
            ->andFilterWhere(['like', 'ev_content', $this->ev_content]);

        return $dataProvider;
    }
}
