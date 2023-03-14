<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teknisi".
 *
 * @property int $id_teknisi
 * @property int $id_user
 * @property string $nama_lengkap
 * @property int $nik
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property int $no_hp
 * @property string $alamat
 * @property string $email
 * @property string|null $cv
 * @property string|null $card_idy
 * @property string $status
 * @property int $point
 * @property string $foto
 * @property string $create_at
 *
 * @property Feedback[] $feedbacks
 * @property Invoice[] $invoices
 * @property OrderDisplay[] $orderDisplays
 * @property User $user
 */
class Teknisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $username;
    public $password_data;
    public $created_at, $_cv, $_foto;
    public static function tableName()
    {
        return 'teknisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nama_lengkap', 'nik', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'alamat', 'email', 'status', 'point', 'create_at'], 'required'],
            [['id_user', 'nik', 'no_hp', 'point'], 'integer'],
            [['create_at', 'username', 'password_data'], 'safe'],
            [['nama_lengkap', 'tempat_lahir', 'alamat', 'email', 'card_idy', 'status'], 'string', 'max' => 50],
            [['cv', 'foto'], 'file', 'extensions' => ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'], 'maxSize' => 1024 * 1024 * 10],
            ['password_data', 'required'],
            ['password_data', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['tgl_lahir'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    //     public function rules()
    // {
    //     return [
    //         [['id_user', 'nama_lengkap', 'nik', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'alamat', 'email', 'status', 'point', 'create_at'], 'required'],
    //         [['id_user', 'nik', 'no_hp', 'point'], 'integer'],
    //         [['tgl_lahir', 'create_at', 'username'], 'safe'],
    //         [['nama_lengkap', 'tempat_lahir', 'alamat', 'email', 'card_idy', 'status'], 'string', 'max' => 50],
    //         [['cv', 'foto'], 'file', 'extensions' => ['pdf', 'jpg', 'jpeg', 'png']],
    //         ['password', 'required'],
    //         ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
    //         [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_teknisi' => 'Id Teknisi',
            'id_user' => 'Id User',
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'Nik',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'no_hp' => 'No Hp',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'cv' => 'Cv',
            'card_idy' => 'Card Idy',
            'status' => 'Status',
            'point' => 'Point',
            'foto' => 'Foto',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['id_teknisi' => 'id_teknisi']);
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['id_teknisi' => 'id_teknisi']);
    }

    /**
     * Gets query for [[OrderDisplays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDisplays()
    {
        return $this->hasMany(OrderDisplay::className(), ['id_teknisi' => 'id_teknisi']);
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
