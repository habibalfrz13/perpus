<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrderHistori;

/**
 * OrderHistorySearch represents the model behind the search form of `backend\models\OrderHistori`.
 */
class OrderHistorySearch extends OrderHistori
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_historis', 'id_user', 'id_order', 'jenis_layanan'], 'integer'],
            [['tanggal', 'status'], 'safe'],
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
        $query = OrderHistori::find();

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
            'id_historis' => $this->id_historis,
            'id_user' => $this->id_user,
            'id_order' => $this->id_order,
            'jenis_layanan' => $this->jenis_layanan,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
