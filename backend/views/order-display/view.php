<?php

use backend\models\Alamat;
use backend\models\MerkAc;
use backend\models\Pelanggan;
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

<div class="card card-body">
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
            <div>
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
                        'id_merk' => [
                            'label' => 'Merk AC',
                            'attribute' => 'id_merk',
                            'value' => $merk->nama,
                        ],
                        'type_ac',
                        [
                            'label' => 'Alamat',
                            'value' => $alamat->alamat,
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
            <?php if (Yii::$app->user->identity->role == 'operator') : ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id_order',
                        'id_user',
                        'jumlah',
                        'jenis_layanan' => [
                            'attribute' => 'jenis_layanan',
                            'value' => function ($model) {
                                return $model->layanan->nama_layanan;
                            },
                        ],
                        'detail',
                        'masalah',
                        'id_merk',
                        'type_ac',
                        'alamat',
                        'jadwal_pengerjaan',
                        'status',
                        'tgl_pesan',
                        'id_teknisi',
                    ],
                ]) ?>
            <?php endif; ?>
            <?php if (Yii::$app->user->identity->role == 'teknisi') : ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id_order',
                        // 'id_user',
                        'jumlah',
                        'jenis_layanan' => [
                            'attribute' => 'jenis_layanan',
                            'value' => function ($model) {
                                return $model->layanan->nama_layanan;
                            },
                        ],
                        'detail',
                        'masalah',
                        'id_merk',
                        'type_ac',
                        'alamat' => [
                            'attribute' => 'alamat',
                            'value' => function ($model) {
                                return $model->alamat;
                            },
                        ],
                        'jadwal_pengerjaan',
                        'status',
                        'tgl_pesan',
                        // 'id_teknisi',
                    ],
                ]) ?>
            <?php endif; ?>
            <div class="mt-3">
                <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
            </div>
            </div>
    </div>
</div>