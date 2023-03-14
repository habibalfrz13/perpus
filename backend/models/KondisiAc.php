<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kondisi_ac".
 *
 * @property int $id
 * @property string $nama
 *
 * @property InvoiceDetail[] $invoiceDetails
 * @property OrderKondisi[] $orderKondisis
 */
class KondisiAc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kondisi_ac';
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
     * Gets query for [[InvoiceDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::className(), ['id_kondisi' => 'id']);
    }

    /**
     * Gets query for [[OrderKondisis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderKondisis()
    {
        return $this->hasMany(OrderKondisi::className(), ['id_kondisi_ac' => 'id']);
    }
}
