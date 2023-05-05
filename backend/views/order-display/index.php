<?php

use backend\models\OrderDisplay;
use backend\models\Alamat;
use backend\models\Layanan;
use backend\models\Pelanggan;
use PhpParser\Node\Stmt\Label;
use yii\bootstrap5\ActiveForm;
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


<?php if (Yii::$app->user->identity->role == 'customer') : ?>
    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>

<?php if (Yii::$app->user->identity->role == 'admin') : ?>
    <div class="card card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col">Nomor Order</th> -->
                    <!-- <th scope="col">Id User</th> -->
                    <th scope="col">Nama User</th>
                    <th scope="col">Jenis Layanan</th>
                    <th scope="col">Jumlah AC</th>
                    <th scope="col">Alamat</th>
                    <!-- <th scope="col">Detail</th> -->
                    <th scope="col">Status</th>
                    <th width="104" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($modelorder as $data) {
                    $alamat = Alamat::find()->where(['id_user' => $data->id_user])->one();
                    $layanan = Layanan::find()->where(['id_layanan' => $data->jenis_layanan])->one();
                    $pelanggan = Pelanggan::find()->where(['id_user' => $data->id_user])->one();
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $pelanggan->nama ?></td>
                        <td><?= $layanan->nama_layanan ?></td>
                        <td><?= $data->jumlah ?></td>
                        <td><?= $alamat->alamat ?></td>
                        <td><?= $data->status ?></td>
                        <td>
                            <a href="view?id_order=<?= $data->id_order ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                            <a href="update?id_order=<?= $data->id_order ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                            <?php $form = ActiveForm::begin([
                                'action' => ['order-display/delete', 'id_order' => $data->id_order],
                                'method' => 'post',
                            ]) ?>
                            <button type="submit" class="btn btn-danger my-2"><i class="bi bi-x-circle"></i></button>
                            <?php ActiveForm::end() ?>


                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
                            'jenis_layanan' => [
                                'attribute' => 'jenis_layanan',
                                'value' => function ($model) {
                                    return $model->layanan->nama_layanan;
                                },
                            ],
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
                            'jenis_layanan' => [
                                'attribute' => 'jenis_layanan',
                                'value' => function ($model) {
                                    return $model->layanan->nama_layanan;
                                },
                            ],
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


<?php if (Yii::$app->user->identity->role == 'teknisi') : ?>
    <div class="card-body table-hover">
        <?= GridView::widget([
            'dataProvider' => $dataProvider1,
            'filterModel' => $searchModel1,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_order',
                // 'id_user',
                // 'jumlah',
                'jenis_layanan' => [
                    'attribute' => 'jenis_layanan',
                    'value' => function ($model) {
                        return $model->layanan->nama_layanan;
                    },
                ],
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
                    'template' => '{terima} {invoice} {view}',
                    'buttons' => [
                        'terima' => function ($url, $model) {
                            $label = $model->status == 'diterima' ? 'Cancel' : 'Terima';
                            $confirm = $model->status == 'diterima' ? 'Apakah anda yakin ingin membatalkan pesanan?' : 'Apakah anda yakin ingin menerima pesanan ini?';
                            $class = $model->status == 'diterima' ? 'btn-danger' : 'btn-success';

                            return Html::a($label, ['order-display/update', 'id_order' => $model->id_order], [
                                'title' => $model->status == 'diterima' ? 'Cancel Pesanan' : 'Terima Pesanan',
                                'data-confirm' => Yii::t('yii', $confirm),
                                'data-method' => 'post',
                                'class' => 'btn ' . $class,
                            ]);
                        },
                        'invoice' => function ($url, $model) {
                            if ($model->status == 'dipesan') {
                                return ''; // Jika pesanan belum diterima, tombol invoice tidak ditampilkan
                            } else {
                                return Html::a('Invoice', ['invoice/create', 'id_order' => $model->id_order], [
                                    'title' => Yii::t('yii', 'Proses Pesanan'),
                                    'class' => 'btn btn-info',
                                ]);
                            }
                        },
                        'view' => function ($url, $model) {
                            return Html::a('<i class="fa fa-eye"></i>', ['order-display/view', 'id_order' => $model->id_order], [
                                'title' => Yii::t('yii', 'View Detail'),
                                'class' => 'btn btn-info',
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
<?php endif; ?>

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
                                        ['order-display/delete', 'id_order' => $model->id_order, 'id_teknisi' => $model->id_teknisi],
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