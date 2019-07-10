<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustomEvent;

/**
 * CustomEventSearch represents the model behind the search form of `common\models\CustomEvent`.
 */
class CustomEventSearch extends CustomEvent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ev_id', 'ev_userid', 'ev_color'], 'integer'],
            [['ev_name', 'ev_description', 'ev_place'], 'safe'],
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
        $query = CustomEvent::find();

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
            'ev_userid' => $this->ev_userid,
            'ev_color' => $this->ev_color,
        ]);

        $query->andFilterWhere(['like', 'ev_name', $this->ev_name])
            ->andFilterWhere(['like', 'ev_description', $this->ev_description])
            ->andFilterWhere(['like', 'ev_place', $this->ev_place]);

        return $dataProvider;
    }
}
