<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Teknisi;

/**
 * TeknisiSearch represents the model behind the search form of `backend\models\Teknisi`.
 */
class TeknisiSearch extends Teknisi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_teknisi', 'id_user', 'nik', 'no_hp', 'point'], 'integer'],
            [['nama_lengkap', 'tempat_lahir', 'tgl_lahir', 'alamat', 'email', 'cv', 'card_idy', 'status', 'foto', 'create_at'], 'safe'],
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
        $query = Teknisi::find()
            ->joinWith('user')
            ->where(['user.role' => 'teknisi']);

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
            'id_teknisi' => $this->id_teknisi,
            'id_user' => $this->id_user,
            'nik' => $this->nik,
            'tgl_lahir' => $this->tgl_lahir,
            'no_hp' => $this->no_hp,
            'point' => $this->point,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cv', $this->cv])
            ->andFilterWhere(['like', 'card_idy', $this->card_idy])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }

    public function searchOperator($params)
    {
        $query = Teknisi::find()
            ->joinWith('user')
            ->where(['user.role' => 'operator']);

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
            'id_teknisi' => $this->id_teknisi,
            'id_user' => $this->id_user,
            'nik' => $this->nik,
            'tgl_lahir' => $this->tgl_lahir,
            'no_hp' => $this->no_hp,
            'point' => $this->point,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cv', $this->cv])
            ->andFilterWhere(['like', 'card_idy', $this->card_idy])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
