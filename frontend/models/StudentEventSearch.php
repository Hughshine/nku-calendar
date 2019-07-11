<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentEvent;

/**
 * StudentEventSearch represents the model behind the search form of `common\models\StudentEvent`.
 */
class StudentEventSearch extends StudentEvent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_id', 'ev_userid', 'ev_superevent_id', 'ev_color', 'ev_status'], 'integer'],
            [['ev_time', 'ev_name', 'ev_place', 'ev_description'], 'safe'],
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
        $query = StudentEvent::find();

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
            'ev_userid' => $this->ev_userid,
            'ev_superevent_id' => $this->ev_superevent_id,
            'ev_color' => $this->ev_color,
            'ev_status' => $this->ev_status,
        ]);

        $query->andFilterWhere(['like', 'ev_name', $this->ev_name])
            ->andFilterWhere(['like', 'ev_place', $this->ev_place])
            ->andFilterWhere(['like', 'ev_description', $this->ev_description]);

        return $dataProvider;
    }
}
