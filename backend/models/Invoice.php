<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_teknisi
 * @property float $total
 * @property string $create_at
 *
 * @property InvoiceDetail[] $invoiceDetails
 * @property OrderDisplay $order
 * @property Teknisi $teknisi
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_teknisi', 'total', 'create_at'], 'required'],
            [['id_order', 'id_teknisi'], 'integer'],
            [['total'], 'number'],
            [['create_at'], 'safe'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDisplay::className(), 'targetAttribute' => ['id_order' => 'id_order']],
            [['id_teknisi'], 'exist', 'skipOnError' => true, 'targetClass' => Teknisi::className(), 'targetAttribute' => ['id_teknisi' => 'id_teknisi']],
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
            'id_teknisi' => 'Id Teknisi',
            'total' => 'Total',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[InvoiceDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::className(), ['id_invoice' => 'id']);
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
     * Gets query for [[Teknisi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeknisi()
    {
        return $this->hasOne(Teknisi::className(), ['id_teknisi' => 'id_teknisi']);
    }
}
