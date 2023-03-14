<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrderDisplay;

/**
 * OrderDisplaySearch represents the model behind the search form of `backend\models\OrderDisplay`.
 */
class OrderDisplaySearch extends OrderDisplay
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_user', 'jumlah', 'id_merk', 'id_teknisi', 'point_teknisi'], 'integer'],
            [['jenis_layanan', 'detail', 'masalah', 'type_ac', 'alamat', 'jadwal_pengerjaan', 'status', 'tgl_pesan'], 'safe'],
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
        $query = OrderDisplay::find();

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
            'id_order' => $this->id_order,
            'id_user' => $this->id_user,
            'jumlah' => $this->jumlah,
            'id_merk' => $this->id_merk,
            'jadwal_pengerjaan' => $this->jadwal_pengerjaan,
            'tgl_pesan' => $this->tgl_pesan,
            'id_teknisi' => $this->id_teknisi,
            'point_teknisi' => $this->point_teknisi,
        ]);

        $query->andFilterWhere(['like', 'jenis_layanan', $this->jenis_layanan])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'masalah', $this->masalah])
            ->andFilterWhere(['like', 'type_ac', $this->type_ac])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
