<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notifikasi_point".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_user
 * @property int $jumlah_point
 * @property string $judul
 * @property string $keterangan
 * @property string $create_at
 *
 * @property OrderDisplay $order
 * @property User $user
 */
class NotifikasiPoint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifikasi_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_user', 'jumlah_point', 'judul', 'keterangan', 'create_at'], 'required'],
            [['id_order', 'id_user', 'jumlah_point'], 'integer'],
            [['create_at'], 'safe'],
            [['judul', 'keterangan'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
            'id_user' => 'Id User',
            'jumlah_point' => 'Jumlah Point',
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
