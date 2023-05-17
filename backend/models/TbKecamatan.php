<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_kecamatan".
 *
 * @property int $id
 * @property int|null $id_kota_kabupaten
 * @property string $nama
 *
 * @property TbKotaKabupaten $kotaKabupaten
 */
class TbKecamatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id', 'id_kota_kabupaten'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_kota_kabupaten'], 'exist', 'skipOnError' => true, 'targetClass' => TbKotaKabupaten::className(), 'targetAttribute' => ['id_kota_kabupaten' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kota_kabupaten' => 'Id Kota Kabupaten',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[KotaKabupaten]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKotaKabupaten()
    {
        return $this->hasOne(TbKotaKabupaten::className(), ['id' => 'id_kota_kabupaten']);
    }
}
