<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notifikasi_order".
 *
 * @property int $id
 * @property int $id_order
 * @property string $judul
 * @property string $keterangan
 * @property string $create_at
 *
 * @property OrderDisplay $order
 */
class NotifikasiOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifikasi_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'judul', 'keterangan', 'create_at'], 'required'],
            [['id_order'], 'integer'],
            [['create_at'], 'safe'],
            [['judul', 'keterangan'], 'string', 'max' => 50],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDisplay::className(), 'targetAttribute' => ['id_order' => 'id_order']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(OrderDisplay::className(), ['id_order' => 'id_order']);
    }
}
