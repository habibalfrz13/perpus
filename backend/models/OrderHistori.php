<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_histori".
 *
 * @property int $id_historis
 * @property int $id_user
 * @property int $id_order
 * @property int $jenis_layanan
 * @property string $tanggal
 * @property string $status
 *
 * @property OrderDisplay $order
 * @property User $user
 */
class OrderHistori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_histori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_order', 'jenis_layanan', 'tanggal', 'status'], 'required'],
            [['id_user', 'id_order', 'jenis_layanan'], 'integer'],
            [['tanggal'], 'safe'],
            [['status'], 'string', 'max' => 50],
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
            'id_historis' => 'Id Historis',
            'id_user' => 'Id User',
            'id_order' => 'Id Order',
            'jenis_layanan' => 'Jenis Layanan',
            'tanggal' => 'Tanggal',
            'status' => 'Status',
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
