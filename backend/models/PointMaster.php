<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "point_master".
 *
 * @property int $id_point
 * @property string $keterangan
 * @property int $jumlah_ac
 * @property int $jumlah_order
 * @property int $jumlah_point
 */
class PointMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'point_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keterangan', 'jumlah_ac', 'jumlah_point'], 'required'],
            [['jumlah_ac', 'jumlah_order', 'jumlah_point'], 'integer'],
            [['keterangan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_point' => 'Id Point',
            'keterangan' => 'Keterangan',
            'jumlah_ac' => 'Jumlah Ac',
            'jumlah_order' => 'Jumlah Order',
            'jumlah_point' => 'Jumlah Point',
        ];
    }
}
