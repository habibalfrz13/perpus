<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string $role
 *
 * @property Alamat[] $alamats
 * @property Feedback[] $feedbacks
 * @property HistorisOrder[] $historisOrders
 * @property NotifikasiPoint[] $notifikasiPoints
 * @property OrderDisplay[] $orderDisplays
 * @property Pelanggan[] $pelanggans
 * @property Teknisi[] $teknisis
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $password_data;
    public $nama;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'role'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['role'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['nama'], 'safe'],
            [['username'], 'unique'],
            ['password_data', 'required'],
            ['password_data', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[Alamats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlamats()
    {
        return $this->hasMany(Alamat::className(), ['id_user' => 'id']);
    }


    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['id_user' => 'id']);
    }

    /**
     * Gets query for [[HistorisOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistorisOrders()
    {
        return $this->hasMany(OrderHistori::className(), ['id_user' => 'id']);
    }

    /**
     * Gets query for [[NotifikasiPoints]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifikasiPoints()
    {
        return $this->hasMany(NotifikasiPoint::className(), ['id_user' => 'id']);
    }

    /**
     * Gets query for [[OrderDisplays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDisplays()
    {
        return $this->hasMany(OrderDisplay::className(), ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Pelanggans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggans()
    {
        return $this->hasMany(Pelanggan::className(), ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Teknisis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeknisis()
    {
        return $this->hasMany(Teknisi::className(), ['id_user' => 'id']);
    }
}
