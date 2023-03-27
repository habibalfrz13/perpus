<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id_feedback
 * @property int $id_user
 * @property int $id_order
 * @property int $id_teknisi
 * @property float $rating
 * @property string $ulasan
 * @property string $create_at
 * @property int $point
 *
 * @property FotoFeedback[] $fotoFeedbacks
 * @property OrderDisplay $order
 * @property Teknisi $teknisi
 * @property User $user
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_order', 'id_teknisi', 'rating', 'ulasan', 'create_at', 'point'], 'required'],
            [['id_user', 'id_order', 'id_teknisi', 'point'], 'integer'],
            [['rating'], 'number'],
            [['create_at'], 'safe'],
            [['ulasan'], 'string', 'max' => 50],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDisplay::className(), 'targetAttribute' => ['id_order' => 'id_order']],
            [['id_teknisi'], 'exist', 'skipOnError' => true, 'targetClass' => Teknisi::className(), 'targetAttribute' => ['id_teknisi' => 'id_teknisi']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_feedback' => 'Id Feedback',
            'id_user' => 'Id User',
            'id_order' => 'Id Order',
            'id_teknisi' => 'Id Teknisi',
            'rating' => 'Rating',
            'ulasan' => 'Ulasan',
            'create_at' => 'Create At',
            'point' => 'Point',
        ];
    }

    /**
     * Gets query for [[FotoFeedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFotoFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['id_feedback' => 'id_feedback']);
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
