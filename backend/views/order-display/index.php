<?php

use backend\models\OrderDisplay;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplaySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Order Display';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->user->identity->role == 'admin') : ?>
    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>

<?php if (Yii::$app->user->identity->role == 'customer') : ?>
    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>

<?php if (Yii::$app->user->identity->role == 'admin') : ?>
    <div class="card-body">
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
                // 'id_teknisi',
                //'point_teknisi',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, OrderDisplay $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_order' => $model->id_order]);
                    }
                ],
            ],
        ]); ?>
    </div>
<?php endif; ?>


<?php if (Yii::$app->user->identity->role == 'operator') : ?>
    <div>
        <div class="card-body">
            <div class="card">
                <div class="card-body table-hover">
                    <h4>Layanan Cuci</h4>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider1,
                        'filterModel' => $searchModel1,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            // 'id_order',
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
                            'id_teknisi',
                            //'point_teknisi',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, OrderDisplay $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id_order' => $model->id_order]);
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="card">
                <div class="card-body table-hover">
                    <h4>Layanan Service</h4>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider2,
                        'filterModel' => $searchModel2,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id_order',
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
                            'id_teknisi',
                            //'point_teknisi',
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{pilih-teknisi} {delete} {view}',
                                'buttons' => [
                                    'pilih-teknisi' => function ($url, $model) {
                                        return Html::a(
                                            '<i class="fa fa-user-plus"></i>',
                                            ['order-display/update', 'id_order' => $model->id_order],
                                            [
                                                'title' => Yii::t('yii', 'Pilih Teknisi'),
                                                'data-method' => 'post',
                                                'class' => 'btn btn-primary',
                                            ]
                                        );
                                    },
                                ],
                                'urlCreator' => function ($action, OrderDisplay $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id_order' => $model->id_order]);
                                }
                            ],

                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="card-body table-hover">
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
                    'template' => '{terima} {view}',
                    'buttons' => [
                        'terima' => function ($url, $model) {
                            if ($model->status == 'diterima') {
                                return Html::a(
                                    '<i class="">Cancel</i>',
                                    ['order-display/update', 'id_order' => $model->id_order],
                                    [
                                        'title' => Yii::t('yii', 'Cancel Pesanan'),
                                        'data-confirm' => Yii::t('yii', 'Apakah anda yakin ingin membatalkan pesanan?'),
                                        'data-method' => 'post',
                                        'class' => 'btn btn-danger',
                                    ]
                                ); // Jika status pesanan sudah diterima, tombol Terima tidak ditampilkan
                            } else {
                                return Html::a(
                                    '<i class="">Terima</i>',
                                    ['order-display/update', 'id_order' => $model->id_order],
                                    [
                                        'title' => Yii::t('yii', 'Terima Pesanan'),
                                        'data-confirm' => Yii::t('yii', 'Apakah anda yakin ingin menerima pesanan ini?'),
                                        'data-method' => 'post',
                                        'class' => 'btn btn-success',
                                    ]
                                );
                            }
                        },
                        'view' => function ($url, $model) {
                            return Html::a(
                                '<i class="fa fa-eye"></i>',
                                ['order-display/view', 'id_order' => $model->id_order],
                                [
                                    'title' => Yii::t('yii', 'View Detail'),
                                    'class' => 'btn btn-info',
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>
    <?php endif; ?>
</div>

<?php if (Yii::$app->user->identity->role == 'customer') : ?>
    <div class="card table-hover mx-1,5">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_order',
                    // 'id_user',
                    'jumlah',
                    'jenis_layanan',
                    'detail',
                    //'masalah',
                    //'id_merk',
                    //'type_ac',
                    'alamat',
                    //'jadwal_pengerjaan',
                    'status',
                    'tgl_pesan',
                    //'id_teknisi',
                    //'point_teknisi',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{terima}',
                        'buttons' => [
                            'terima' => function ($url, $model) {
                                if ($model->status == 'diterima') {
                                    return Html::a(
                                        '<i class="">Done</i>',
                                        ['order-display/delete', 'id_order' => $model->id_order],
                                        [
                                            'title' => Yii::t('yii', 'Pesanan Selesai'),
                                            'data-confirm' => Yii::t('yii', 'Apakah pesanan anda sudah selesai?'),
                                            'data-method' => 'post',
                                            'class' => 'btn btn-success',
                                        ]
                                    );
                                } else {
                                    return Html::a(
                                        '<i class="">Cancel</i>',
                                        ['order-display/delete', 'id_order' => $model->id_order],
                                        [
                                            'title' => Yii::t('yii', 'Cancel Pesanan'),
                                            'data-confirm' => Yii::t('yii', 'Apakah anda yakin ingin membatalkan pesanan ini?'),
                                            'data-method' => 'post',
                                            'class' => 'btn btn-danger',
                                        ]
                                    );
                                }
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
<?php endif; ?>