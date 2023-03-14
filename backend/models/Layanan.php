<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "layanan".
 *
 * @property int $id_layanan
 * @property string $nama_layanan
 * @property string $jenis_layanan
 * @property string $deskripsi
 */
class Layanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'layanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_layanan', 'jenis_layanan', 'deskripsi'], 'required'],
            [['nama_layanan', 'jenis_layanan', 'deskripsi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_layanan' => 'Id Layanan',
            'nama_layanan' => 'Nama Layanan',
            'jenis_layanan' => 'Jenis Layanan',
            'deskripsi' => 'Deskripsi',
        ];
    }
}
