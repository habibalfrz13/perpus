<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alamat_kategori".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Alamat[] $alamats
 */
class AlamatKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alamat_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50],
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
     * Gets query for [[Alamats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlamats()
    {
        return $this->hasMany(Alamat::className(), ['id_kategori' => 'id']);
    }
}
