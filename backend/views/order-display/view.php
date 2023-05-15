<?php

use backend\models\Alamat;
use backend\models\KondisAcorder;
use backend\models\MerkAc;
use backend\models\OrderDisplay;
use backend\models\Invoice;
use backend\models\Feedback;
use backend\models\OrderHistori;
use backend\models\Pelanggan;
use backend\models\KondisiAc;
use backend\models\InvoiceDetail;
use backend\models\Layanan;
use backend\models\Teknisi;
use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var backend\models\OrderDisplay $model */

$this->title = $model->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Order Displays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php
$modelfeedback = Feedback::find()->where(['id_order' => $model->id_order])->one();
$modelinvoice = Invoice::find()->where(['id_order' => $model->id_order])->one();
?>

<div class="">
    <div class="order-display-view">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?php if (Yii::$app->user->identity->role == 'operator') : ?>
                <?= Html::a('Invoice', ['invoice-detail/create', 'id_order' => $model->id_order], ['class' => 'btn btn-info']) ?>
                <?= Html::a('Update', ['update', 'id_order' => $model->id_order], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id_order' => $model->id_order], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            <?php endif; ?>
        </p>

        <?php if (Yii::$app->user->identity->role == 'admin') : ?>
            <?php
            $alamat = Alamat::find()->where(['id_alamat' => $model->alamat])->one();
            $merk = MerkAc::find()->where(['id' => $model->id_merk])->one();
            $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
            $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();

            ?>
            <div class="card card-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'label' => 'Nomor Order',
                            'value' => $model->id_order,
                        ],
                        'id_user' => [
                            'label' => 'Nama Pelanggan',
                            'attribute' => 'id_merk',
                            'value' => $pelanggan->nama,
                        ],
                        'jumlah' => [
                            'label' => 'Jumlah Ac',
                            'value' => $model->jumlah,
                        ],
                        'jenis_layanan' => [
                            'attribute' => 'jenis_layanan',
                            'value' => function ($model) {
                                return $model->layanan->nama_layanan;
                            },
                        ],
                        'detail',
                        'masalah',
                        [
                            'label' => 'Kondisi Ac',
                            'value' => function ($model) {
                                $kondisiacorder = KondisAcorder::find()->where(['id_order' => $model->id_order])->all();
                                $kondisiAcArray = [];
                                foreach ($kondisiacorder as $kondisi) {
                                    $kondisiAcArray[] = $kondisi->kondisi; //ganti attribute dengan atribut yang diinginkan dari model KondisAcorder
                                }
                                return implode(", ", $kondisiAcArray);
                            },
                        ],
                        'id_merk' => [
                            'label' => 'Merk AC',
                            'attribute' => 'id_merk',
                            'value' => $merk->nama,
                        ],
                        'jadwal_pengerjaan',
                        'status',
                        'tgl_pesan',
                        'id_teknisi' => [
                            'label' => 'Nama Teknisi',
                            'attribute' => 'id_teknisi',
                            'value' => function ($model) {
                                $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();
                                return $teknisi ? $teknisi->nama_lengkap : "Teknisi Belum Ada";
                            },
                        ],
                    ],
                ]) ?>
            <?php endif; ?>

            <?php if (Yii::$app->user->identity->role == 'customer') : ?>
                <?php
                $alamat = Alamat::find()->where(['id_alamat' => $model->alamat])->one();
                $merk = MerkAc::find()->where(['id' => $model->id_merk])->one();
                $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();
                ?>
                <div class="card card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'label' => 'Nomor Order',
                                'value' => $model->id_order,
                            ],
                            'id_user' => [
                                'label' => 'Nama Pelanggan',
                                'attribute' => 'id_merk',
                                'value' => $pelanggan->nama,
                            ],
                            'jumlah' => [
                                'label' => 'Jumlah Ac',
                                'value' => $model->jumlah,
                            ],
                            'jenis_layanan' => [
                                'attribute' => 'jenis_layanan',
                                'value' => function ($model) {
                                    return $model->layanan->nama_layanan;
                                },
                            ],
                            'detail',
                            'masalah',
                            [
                                'label' => 'Kondisi Ac',
                                'value' => function ($model) {
                                    $kondisiacorder = KondisAcorder::find()->where(['id_order' => $model->id_order])->all();
                                    $kondisiAcArray = [];
                                    foreach ($kondisiacorder as $kondisi) {
                                        $kondisiAcArray[] = $kondisi->kondisi; //ganti attribute dengan atribut yang diinginkan dari model KondisAcorder
                                    }
                                    return implode(", ", $kondisiAcArray);
                                },
                            ],
                            'id_merk' => [
                                'label' => 'Merk AC',
                                'attribute' => 'id_merk',
                                'value' => $merk->nama,
                            ],
                            'jadwal_pengerjaan',
                            'status',
                            'tgl_pesan',
                            'id_teknisi' => [
                                'label' => 'Nama Teknisi',
                                'attribute' => 'id_teknisi',
                                'value' => function ($model) {
                                    $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();
                                    return $teknisi ? $teknisi->nama_lengkap : "Teknisi Belum Ada";
                                },
                            ],
                        ],
                    ]) ?>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <div class="Feedback">
                                <h3> Feedback </h3>
                                <?php if ($modelfeedback !== null) : ?>
                                    <?= DetailView::widget([
                                        'model' => $modelfeedback,
                                        'attributes' => [
                                            'rating',
                                            'ulasan',
                                            [
                                                'attribute' => 'foto_feedback',
                                                'format' => 'raw',
                                                'value' => function ($model) {
                                                    return Html::img('../../backend/uploads/fotofeedback/' . $model->foto_feedback, ['alt' => 'Foto', 'class' => 'img-thumbnail', 'width' => '150px']);
                                                }
                                            ],
                                        ],
                                    ]) ?>
                                <?php else : ?>
                                    <p>Belum ada Feedback</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-body">
                            <div class="Invoice">
                                <h3> Invoice </h3>
                                <?php if ($modelinvoice !== null) : ?>
                                    <?= DetailView::widget([
                                        'model' => $modelinvoice,
                                        'attributes' => [
                                            'total',
                                            'layanan' => [
                                                'attribute' => 'layanan',
                                                'value' => function ($modelinvoice) {
                                                    $detail = InvoiceDetail::find()->where(['id_invoice' => $modelinvoice->id])->one();
                                                    return $detail !== null ? $detail->nama : '';
                                                },
                                            ],
                                            [
                                                'label' => 'Detail Kerusakan',
                                                'value' => function ($modelinvoice) {
                                                    $kondisiacorder = KondisAcorder::find()->where(['id_order' => $modelinvoice->id_order])->all();
                                                    $kondisiAcArray = [];
                                                    foreach ($kondisiacorder as $kondisi) {
                                                        $kondisiAcArray[] = $kondisi->kondisi; //ganti attribute dengan atribut yang diinginkan dari model KondisAcorder
                                                    }
                                                    return implode(", ", $kondisiAcArray);
                                                },
                                            ],
                                            [
                                                'label' => 'Jenis Layanan',
                                                'value' => function ($modelinvoice) {
                                                    $histori = OrderHistori::find()->where(['id_order' => $modelinvoice->id_order])->one();
                                                    $layanan = Layanan::find()->where(['id_layanan' => $histori->jenis_layanan])->one();
                                                    return $layanan !== null ? $layanan->nama_layanan : 'Tidak Ada Layanan';
                                                }
                                            ],
                                            [
                                                'label' => 'Jumlah Ac',
                                                'value' => function ($modelinvoice) {
                                                    $ac = OrderDisplay::find()->where(['id_order' => $modelinvoice->id_order])->one();
                                                    return $ac !== null ? $ac->jumlah : '-';
                                                }
                                            ],
                                            'create_at' => [
                                                'label' => 'Tanggal Selesai',
                                                'attribute' => 'create_at',
                                            ],
                                        ],
                                    ]) ?>
                                <?php else : ?>
                                    <p>Belum ada Invoice</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (Yii::$app->user->identity->role == 'teknisi') : ?>
                <?php
                $alamat = Alamat::find()->where(['id_alamat' => $model->alamat])->one();
                $merk = MerkAc::find()->where(['id' => $model->id_merk])->one();
                $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();

                ?>
                <div class="card card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'label' => 'Nomor Order',
                                'value' => $model->id_order,
                            ],
                            'id_user' => [
                                'label' => 'Nama Pelanggan',
                                'attribute' => 'id_merk',
                                'value' => $pelanggan->nama,
                            ],
                            'jumlah' => [
                                'label' => 'Jumlah Ac',
                                'value' => $model->jumlah,
                            ],
                            'jenis_layanan' => [
                                'attribute' => 'jenis_layanan',
                                'value' => function ($model) {
                                    return $model->layanan->nama_layanan;
                                },
                            ],
                            'detail',
                            'masalah',
                            [
                                'label' => 'Kondisi Ac',
                                'value' => function ($model) {
                                    $kondisiacorder = KondisAcorder::find()->where(['id_order' => $model->id_order])->all();
                                    $kondisiAcArray = [];
                                    foreach ($kondisiacorder as $kondisi) {
                                        $kondisiAcArray[] = $kondisi->kondisi; //ganti attribute dengan atribut yang diinginkan dari model KondisAcorder
                                    }
                                    return implode(", ", $kondisiAcArray);
                                },
                            ],
                            'id_merk' => [
                                'label' => 'Merk AC',
                                'attribute' => 'id_merk',
                                'value' => $merk->nama,
                            ],
                            'jadwal_pengerjaan',
                            'status',
                            'tgl_pesan',
                            'id_teknisi' => [
                                'label' => 'Nama Teknisi',
                                'attribute' => 'id_teknisi',
                                'value' => function ($model) {
                                    $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();
                                    return $teknisi ? $teknisi->nama_lengkap : "Teknisi Belum Ada";
                                },
                            ],
                        ],
                    ]) ?>
                </div>
            <?php endif; ?>

            <?php if (Yii::$app->user->identity->role == 'operator') : ?>
                <?php
                $alamat = Alamat::find()->where(['id_alamat' => $model->alamat])->one();
                $merk = MerkAc::find()->where(['id' => $model->id_merk])->one();
                $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();

                ?>
                <div class="card card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'label' => 'Nomor Order',
                                'value' => $model->id_order,
                            ],
                            'id_user' => [
                                'label' => 'Nama Pelanggan',
                                'attribute' => 'id_merk',
                                'value' => $pelanggan->nama,
                            ],
                            'jumlah' => [
                                'label' => 'Jumlah Ac',
                                'value' => $model->jumlah,
                            ],
                            'jenis_layanan' => [
                                'attribute' => 'jenis_layanan',
                                'value' => function ($model) {
                                    return $model->layanan->nama_layanan;
                                },
                            ],
                            'detail',
                            'masalah',
                            [
                                'label' => 'Kondisi Ac',
                                'value' => function ($model) {
                                    $kondisiacorder = KondisAcorder::find()->where(['id_order' => $model->id_order])->all();
                                    $kondisiAcArray = [];
                                    foreach ($kondisiacorder as $kondisi) {
                                        $kondisiAcArray[] = $kondisi->kondisi; //ganti attribute dengan atribut yang diinginkan dari model KondisAcorder
                                    }
                                    return implode(", ", $kondisiAcArray);
                                },
                            ],
                            'id_merk' => [
                                'label' => 'Merk AC',
                                'attribute' => 'id_merk',
                                'value' => $merk->nama,
                            ],
                            'jadwal_pengerjaan',
                            'status',
                            'tgl_pesan',
                            'id_teknisi' => [
                                'label' => 'Nama Teknisi',
                                'attribute' => 'id_teknisi',
                                'value' => function ($model) {
                                    $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();
                                    return $teknisi ? $teknisi->nama_lengkap : "Teknisi Belum Ada";
                                },
                            ],
                        ],
                    ]) ?>
                </div>
            <?php endif; ?>



            <div class="mt-3">
                <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
            </div>
            </div>
    </div>
</div>