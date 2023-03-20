<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "topup".
 *
 * @property int $id_topup
 * @property int|null $id_user
 * @property float|null $jumlah_topup
 * @property int|null $jumlah_point
 * @property string|null $keterangan
 *
 * @property User $user
 */
class Topup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'topup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'jumlah_point'], 'integer'],
            [['jumlah_topup'], 'number'],
            [['keterangan'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_topup' => 'Id Topup',
            'id_user' => 'Id User',
            'jumlah_topup' => 'Jumlah Topup',
            'jumlah_point' => 'Jumlah Point',
            'keterangan' => 'Keterangan',
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
