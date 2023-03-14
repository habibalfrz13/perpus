<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property int $id_pelanggan
 * @property int $id_user
 * @property string $nama
 * @property int $no_hp
 * @property string $email
 * @property int $point
 * @property string $status
 * @property string $foto
 * @property string $create_at
 * @property int|null $kode_otp
 *
 * @property User $user
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $username;
    public $password_data;
    public $created_at;
    public $_foto;

    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nama', 'no_hp', 'email', 'status', 'create_at'], 'required'],
            [['id_user', 'no_hp', 'point', 'kode_otp'], 'integer'],
            [['status'], 'string'],
            [['create_at', 'username'], 'safe'],
            [['nama', 'email'], 'string', 'max' => 50],
            ['password_data', 'required'],
            ['password_data', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => ['pdf', 'jpg', 'jpeg', 'png'], 'maxSize' => 1024 * 1024 * 10],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pelanggan' => 'Id Pelanggan',
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'point' => 'Point',
            'status' => 'Status',
            'foto' => 'Foto',
            'create_at' => 'Create At',
            'kode_otp' => 'Kode Otp',
        ];
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
