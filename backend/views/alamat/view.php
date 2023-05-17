<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Pelanggan;
use backend\models\TbProvinsi;
use backend\models\TbKotaKabupaten;
use backend\models\TbKecamatan;
use backend\models\AlamatKategori;

/** @var yii\web\View $this */
/** @var backend\models\Alamat $model */

$this->title = $model->id_alamat;
$this->params['breadcrumbs'][] = ['label' => 'Alamats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-body">
    <div class="alamat-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id_alamat' => $model->id_alamat], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id_alamat' => $model->id_alamat], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?php if (Yii::$app->user->identity->role == 'admin') : ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id_alamat',
                    'id_user' => [
                        'attribute' => 'id_user',
                        'label' => 'Nama Pelanggan',
                        'value' => function ($model) {
                            $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                            return $pelanggan ? $pelanggan->nama : "Pelanggan Belum Ada";
                        },
                    ],
                    'id_kategori' => [
                        'attribute' => 'id_kategori',
                        'label' => 'Kategori Alamat',
                        'value' => function ($model) {
                            $alamat = AlamatKategori::find()->where(['id' => $model->id_kategori])->one();
                            return $alamat ? $alamat->nama : "Alamat Tidak Tersedia";
                        },
                    ],
                    'provinsi' => [
                        'attribute' => 'provinsi',
                        'label' => 'Provinsi',
                        'value' => function ($model) {
                            $provinsi = TbProvinsi::find()->where(['id' => $model->provinsi])->one();
                            return $provinsi ? $provinsi->nama : "Tidak Ada Provinsi";
                        }
                    ],
                    'kota' => [
                        'attribute' => 'kota',
                        'label' => 'Kota/Kabupaten',
                        'value' => function ($model) {
                            $kota = TbKotaKabupaten::find()->where(['id' => $model->kota])->one();
                            return $kota ? $kota->nama : "Tidak Ada kota";
                        }
                    ],
                    'kecamatan' => [
                        'attribute' => 'kecamatan',
                        'label' => 'Kecamatan',
                        'value' => function ($model) {
                            $kecamatan = TbKecamatan::find()->where(['id' => $model->kecamatan])->one();
                            return $kecamatan ? $kecamatan->nama : "Tidak Ada kecamatan";
                        }
                    ],
                    'alamat',
                    'kode_pos',
                    'latitude',
                    'longitude',
                    // 'status',
                    // 'create_at',
                ],
            ]) ?>
        <?php endif; ?>

        <?php if (Yii::$app->user->identity->role == 'customer') : ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id_alamat',
                    // 'id_user',
                    'provinsi' => [
                        'attribute' => 'provinsi',
                        'label' => 'Provinsi',
                        'value' => function ($model) {
                            $provinsi = TbProvinsi::find()->where(['id' => $model->provinsi])->one();
                            return $provinsi ? $provinsi->nama : "Tidak Ada Provinsi";
                        }
                    ],
                    'kota' => [
                        'attribute' => 'kota',
                        'label' => 'Kota/Kabupaten',
                        'value' => function ($model) {
                            $kota = TbKotaKabupaten::find()->where(['id' => $model->kota])->one();
                            return $kota ? $kota->nama : "Tidak Ada kota";
                        }
                    ],
                    'kecamatan' => [
                        'attribute' => 'kecamatan',
                        'label' => 'Kecamatan',
                        'value' => function ($model) {
                            $kecamatan = TbKecamatan::find()->where(['id' => $model->kecamatan])->one();
                            return $kecamatan ? $kecamatan->nama : "Tidak Ada kecamatan";
                        }
                    ],
                    'alamat',
                    'kode_pos',
                    'latitude',
                    'longitude',
                    // 'status',
                    // 'create_at',
                    // 'id_kategori',
                ],
            ]) ?>
        <?php endif; ?>

    </div>
    <div class="mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
    </div>
</div>