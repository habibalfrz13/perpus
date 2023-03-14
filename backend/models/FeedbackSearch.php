<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Feedback;

/**
 * FeedbackSearch represents the model behind the search form of `backend\models\Feedback`.
 */
class FeedbackSearch extends Feedback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_feedback', 'id_user', 'id_order', 'id_teknisi', 'point'], 'integer'],
            [['rating'], 'number'],
            [['ulasan', 'create_at'], 'safe'],
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
        $query = Feedback::find();

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
            'id_feedback' => $this->id_feedback,
            'id_user' => $this->id_user,
            'id_order' => $this->id_order,
            'id_teknisi' => $this->id_teknisi,
            'rating' => $this->rating,
            'create_at' => $this->create_at,
            'point' => $this->point,
        ]);

        $query->andFilterWhere(['like', 'ulasan', $this->ulasan]);

        return $dataProvider;
    }
}
