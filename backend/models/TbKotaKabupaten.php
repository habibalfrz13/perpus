<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_kota_kabupaten".
 *
 * @property int $id
 * @property int|null $id_provinsi
 * @property string $nama
 *
 * @property TbProvinsi $provinsi
 * @property TbKecamatan[] $tbKecamatans
 */
class TbKotaKabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_kota_kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id', 'id_provinsi'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_provinsi'], 'exist', 'skipOnError' => true, 'targetClass' => TbProvinsi::className(), 'targetAttribute' => ['id_provinsi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_provinsi' => 'Id Provinsi',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[Provinsi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(TbProvinsi::className(), ['id' => 'id_provinsi']);
    }

    /**
     * Gets query for [[TbKecamatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbKecamatans()
    {
        return $this->hasMany(TbKecamatan::className(), ['id_kota_kabupaten' => 'id']);
    }
}
