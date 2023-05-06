<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_display".
 *
 * @property int $id_order
 * @property int $id_user
 * @property int $jumlah
 * @property string $jenis_layanan
 * @property string $detail
 * @property string $masalah
 * @property int $id_merk
 * @property string $type_ac
 * @property string $alamat
 * @property string $jadwal_pengerjaan
 * @property string $status
 * @property string $tgl_pesan
 * @property int $id_teknisi
 * @property int $point_teknisi
 *
 * @property Feedback[] $feedbacks
 * @property Invoice[] $invoices
 * @property MerkAc $merk
 * @property NotifikasiOrder[] $notifikasiOrders
 * @property NotifikasiPoint[] $notifikasiPoints
 * @property OrderHistori[] $orderHistoris
 * @property OrderKondisi[] $orderKondisis
 * @property Teknisi $teknisi
 * @property User $user
 */
class OrderDisplay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_display';
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['id_user', 'jumlah', 'jenis_layanan', 'detail', 'masalah', 'id_merk', 'alamat', 'jadwal_pengerjaan', 'status', 'tgl_pesan'], 'required'],
            [['id_user', 'jumlah', 'id_merk', 'id_teknisi', 'point_teknisi'], 'integer'],
            [['jadwal_pengerjaan', 'tgl_pesan', 'type_ac', 'id_teknisi', 'point_teknisi', 'kondisi_ac'], 'safe'],
            [['status'], 'string'],
            [['jenis_layanan', 'detail', 'masalah', 'type_ac', 'alamat'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_teknisi'], 'exist', 'skipOnError' => true, 'targetClass' => Teknisi::className(), 'targetAttribute' => ['id_teknisi' => 'id_teknisi']],
            [['id_merk'], 'exist', 'skipOnError' => true, 'targetClass' => MerkAc::className(), 'targetAttribute' => ['id_merk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'id_user' => 'Id User',
            'jumlah' => 'Jumlah',
            'jenis_layanan' => 'Jenis Layanan',
            'detail' => 'Detail',
            'masalah' => 'Masalah',
            'kondisi' => 'Kondisi Ac',
            'id_merk' => 'Id Merk',
            'type_ac' => 'Type Ac',
            'alamat' => 'Alamat',
            'jadwal_pengerjaan' => 'Jadwal Pengerjaan',
            'status' => 'Status',
            'tgl_pesan' => 'Tgl Pesan',
            'id_teknisi' => 'Id Teknisi',
            'point_teknisi' => 'Point Teknisi',
        ];
    }

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['id_order' => 'id_order']);
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['id_order' => 'id_order']);
    }

    /**
     * Gets query for [[Merk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerk()
    {
        return $this->hasOne(MerkAc::className(), ['id' => 'id_merk']);
    }

    /**
     * Gets query for [[NotifikasiOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifikasiOrders()
    {
        return $this->hasMany(NotifikasiOrder::className(), ['id_order' => 'id_order']);
    }

    /**
     * Gets query for [[NotifikasiPoints]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifikasiPoints()
    {
        return $this->hasMany(NotifikasiPoint::className(), ['id_order' => 'id_order']);
    }

    /**
     * Gets query for [[OrderHistoris]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHistoris()
    {
        return $this->hasMany(OrderHistori::className(), ['id_order' => 'id_order']);
    }

    /**
     * Gets query for [[OrderKondisis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderKondisis()
    {
        return $this->hasMany(OrderKondisi::className(), ['id_order' => 'id_order']);
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getAlamat()
    {
        return $this->hasOne(Alamat::class, ['id_user' => 'provinsi']);
    }

    public function getLayanan()
    {
        return $this->hasOne(Layanan::class, ['id_layanan' => 'jenis_layanan']);
    }

    public function getMerkAc()
    {
        return $this->hasOne(MerkAc::class, ['id_merk' => 'nama']);
    }
}
