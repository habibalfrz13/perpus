<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_provinsi".
 *
 * @property int $id
 * @property string $nama
 *
 * @property TbKotaKabupaten[] $tbKotaKabupatens
 */
class TbProvinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[TbKotaKabupatens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbKotaKabupatens()
    {
        return $this->hasMany(TbKotaKabupaten::className(), ['id_provinsi' => 'id']);
    }
}
