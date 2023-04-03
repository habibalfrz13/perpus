<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "invoice_detail".
 *
 * @property int $id
 * @property int $id_invoice
 * @property string $nama
 * @property float $harga
 * @property int $id_kondisi
 * @property string $create_at
 *
 * @property Invoice $invoice
 * @property KondisiAc $kondisi
 */
class InvoiceDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_invoice', 'nama', 'id_kondisi', 'create_at'], 'required'],
            [['id_invoice', 'id_kondisi'], 'integer'],
            [['harga'], 'number'],
            [['create_at', 'harga', 'detail'], 'safe'],
            [['nama'], 'string', 'max' => 50],
            [['id_invoice'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['id_invoice' => 'id']],
            [['id_kondisi'], 'exist', 'skipOnError' => true, 'targetClass' => KondisiAc::className(), 'targetAttribute' => ['id_kondisi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_invoice' => 'Id Invoice',
            'nama' => 'Nama',
            'harga' => 'Harga',
            'id_kondisi' => 'Id Kondisi',
            'create_at' => 'Create At',
            'detail' => 'Detail',
        ];
    }

    /**
     * Gets query for [[Invoice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'id_invoice']);
    }

    /**
     * Gets query for [[Kondisi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKondisi()
    {
        return $this->hasOne(KondisiAc::className(), ['id' => 'id_kondisi']);
    }
}
