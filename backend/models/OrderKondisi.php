<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_kondisi".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_kondisi_ac
 *
 * @property KondisiAc $kondisiAc
 * @property OrderDisplay $order
 */
class OrderKondisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_kondisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_kondisi_ac'], 'required'],
            [['id_order', 'id_kondisi_ac'], 'integer'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDisplay::className(), 'targetAttribute' => ['id_order' => 'id_order']],
            [['id_kondisi_ac'], 'exist', 'skipOnError' => true, 'targetClass' => KondisiAc::className(), 'targetAttribute' => ['id_kondisi_ac' => 'id']],
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
            'id_kondisi_ac' => 'Id Kondisi Ac',
        ];
    }

    /**
     * Gets query for [[KondisiAc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKondisiAc()
    {
        return $this->hasOne(KondisiAc::className(), ['id' => 'id_kondisi_ac']);
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
