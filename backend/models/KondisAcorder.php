<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kondis_acorder".
 *
 * @property int $id
 * @property int|null $id_order
 * @property string|null $kondisi
 *
 * @property OrderDisplay $order
 */
class KondisAcorder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kondis_acorder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order'], 'integer'],
            [['kondisi'], 'string', 'max' => 200],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDisplay::className(), 'targetAttribute' => ['id_order' => 'id_order']],
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
            'kondisi' => 'Kondisi',
        ];
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
