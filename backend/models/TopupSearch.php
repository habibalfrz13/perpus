<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Topup;

/**
 * TopupSearch represents the model behind the search form of `backend\models\Topup`.
 */
class TopupSearch extends Topup
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_topup', 'id_user', 'jumlah_point'], 'integer'],
            [['keterangan'], 'safe'],
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
        $query = Topup::find();

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
            'id_topup' => $this->id_topup,
            'id_user' => $this->id_user,
            'jumlah_point' => $this->jumlah_point,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
