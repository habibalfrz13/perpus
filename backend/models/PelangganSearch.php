<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pelanggan;

/**
 * PelangganSearch represents the model behind the search form of `backend\models\Pelanggan`.
 */
class PelangganSearch extends Pelanggan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelanggan', 'id_user', 'no_hp', 'point', 'kode_otp'], 'integer'],
            [['nama', 'email', 'status', 'foto', 'create_at'], 'safe'],
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
        $query = Pelanggan::find();

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
            'id_pelanggan' => $this->id_pelanggan,
            'id_user' => $this->id_user,
            'no_hp' => $this->no_hp,
            'point' => $this->point,
            'create_at' => $this->create_at,
            'kode_otp' => $this->kode_otp,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
