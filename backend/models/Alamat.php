<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alamat".
 *
 * @property int $id_alamat
 * @property int $id_user
 * @property string $provinsi
 * @property string $kota
 * @property string $kecamatan
 * @property string $alamat
 * @property int $kode_pos
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string $status
 * @property string $create_at
 * @property int $id_kategori
 *
 * @property AlamatKategori $kategori
 * @property User $user
 */
class Alamat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alamat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'provinsi', 'kota', 'kecamatan', 'alamat', 'kode_pos', 'status', 'create_at', 'id_kategori'], 'required'],
            [['id_user', 'kode_pos', 'id_kategori'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['status'], 'string'],
            [['create_at'], 'safe'],
            [['provinsi', 'kota', 'kecamatan'], 'string', 'max' => 50],
            [['alamat'], 'string', 'max' => 200],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => AlamatKategori::className(), 'targetAttribute' => ['id_kategori' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alamat' => 'Id Alamat',
            'id_user' => 'Id User',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'kecamatan' => 'Kecamatan',
            'alamat' => 'Alamat',
            'kode_pos' => 'Kode Pos',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'status' => 'Status',
            'create_at' => 'Create At',
            'id_kategori' => 'Id Kategori',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(AlamatKategori::className(), ['id' => 'id_kategori']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
