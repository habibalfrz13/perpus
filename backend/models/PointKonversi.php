<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "point_konversi".
 *
 * @property int $id
 * @property int $jumlah_point
 * @property float $harga
 * @property string $create_at
 */
class PointKonversi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'point_konversi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jumlah_point', 'harga', 'create_at'], 'required'],
            [['jumlah_point'], 'integer'],
            [['harga'], 'number'],
            [['create_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jumlah_point' => 'Jumlah Point',
            'harga' => 'Harga',
            'create_at' => 'Create At',
        ];
    }
}
