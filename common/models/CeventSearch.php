<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CeventModel;

/**
 * CeventSearch represents the model behind the search form about `common\models\CeventModel`.
 */
class CeventSearch extends CeventModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ev_id', 'ev_adminid', 'ev_number', 'cev_tid', 'ev_maxnumber', 'ev_created_at', 'ev_updated_at'], 'integer'],
            [['ev_start_time', 'ev_title', 'ev_place', 'ev_summary', 'ev_content', 'ev_label_img', 'ev_end_time', 'ev_signup_endtime'], 'safe'],
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
        $query = CeventModel::find();

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
            'ev_start_time' => $this->ev_start_time,
            'ev_adminid' => $this->ev_adminid,
            'ev_number' => $this->ev_number,
            'cev_tid' => $this->cev_tid,
            'ev_maxnumber' => $this->ev_maxnumber,
            'ev_end_time' => $this->ev_end_time,
            'ev_created_at' => $this->ev_created_at,
            'ev_updated_at' => $this->ev_updated_at,
            'ev_signup_endtime' => $this->ev_signup_endtime,
        ]);

        $query->andFilterWhere(['like', 'ev_title', $this->ev_title])
            ->andFilterWhere(['like', 'ev_place', $this->ev_place])
            ->andFilterWhere(['like', 'ev_summary', $this->ev_summary])
            ->andFilterWhere(['like', 'ev_content', $this->ev_content])
            ->andFilterWhere(['like', 'ev_label_img', $this->ev_label_img]);

        return $dataProvider;
    }
}
