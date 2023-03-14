<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "merk_ac".
 *
 * @property int $id
 * @property string $nama
 *
 * @property OrderDisplay[] $orderDisplays
 */
class MerkAc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merk_ac';
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
     * Gets query for [[OrderDisplays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDisplays()
    {
        return $this->hasMany(OrderDisplay::className(), ['id_merk' => 'id']);
    }
}
