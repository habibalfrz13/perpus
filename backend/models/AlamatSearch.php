<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Alamat;

/**
 * AlamatSearch represents the model behind the search form of `backend\models\Alamat`.
 */
class AlamatSearch extends Alamat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alamat', 'id_user', 'kode_pos', 'id_kategori'], 'integer'],
            [['provinsi', 'kota', 'kecamatan', 'alamat', 'status', 'create_at'], 'safe'],
            [['latitude', 'longitude'], 'number'],
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
        $query = Alamat::find();

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
            'id_alamat' => $this->id_alamat,
            'id_user' => $this->id_user,
            'kode_pos' => $this->kode_pos,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'create_at' => $this->create_at,
            'id_kategori' => $this->id_kategori,
        ]);

        $query->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kota', $this->kota])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
