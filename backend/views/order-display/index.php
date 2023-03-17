<?php

use backend\models\OrderDisplay;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplaySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Order Displays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-display-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <p>
            <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_order',
                // 'id_user',
                // 'jumlah',
                'jenis_layanan',
                'detail',
                //'masalah',
                //'id_merk',
                //'type_ac',
                'alamat',
                //'jadwal_pengerjaan',
                'status',
                //'tgl_pesan',
                //'id_teknisi',
                //'point_teknisi',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{konfirmasi}',
                    'buttons' => [
                        'konfirmasi' => function ($url, $model) {
                            return Html::a(
                                '<i class="fas fa-check"></i>',
                                ['feedback/create', 'id_order' => $model->id_order],
                                [
                                    'title' => Yii::t('yii', 'Konfirmasi'),
                                    'data-confirm' => Yii::t('yii', 'Apakah anda yakin ingin melakukan konfirmasi?'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-success',
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>
    <?php endif; ?>


    <?php if (Yii::$app->user->identity->role == 'teknisi') : ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_order',
                // 'id_user',
                // 'jumlah',
                'jenis_layanan',
                'detail',
                //'masalah',
                //'id_merk',
                //'type_ac',
                'alamat',
                //'jadwal_pengerjaan',
                'status',
                //'tgl_pesan',
                //'id_teknisi',
                //'point_teknisi',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{terima}',
                    'buttons' => [
                        'terima' => function ($url, $model) {
                            return Html::a(
                                '<i class="">Terima</i>',
                                ['order-display/terima', 'id_order' => $model->id_order],
                                [
                                    'title' => Yii::t('yii', 'Terima Pesanan'),
                                    'data-confirm' => Yii::t('yii', 'Apakah anda yakin ingin menerima pesanan ini?'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-success',
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>
    <?php endif; ?>


</div>