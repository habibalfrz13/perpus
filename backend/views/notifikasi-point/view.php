<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Pelanggan;
use backend\models\OrderDisplay;
use backend\models\Layanan;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiPoint $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notifikasi Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-body">
    <div class="notifikasi-point-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                // 'id_order',
                [
                    'attribute' => 'id_user',
                    'label' => 'Nama Pelanggan',
                    'value' => function ($model) {
                        $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                        return $pelanggan ? $pelanggan->nama : "Tidak ada nama";
                    },
                ],
                [
                    'label' => 'Jenis Layanan',
                    'value' => function ($model) {
                        $history = OrderDisplay::find()->where(['id_order' => $model->id_order])->one();
                        $layanan = Layanan::find()->where(['id_layanan' => $history->jenis_layanan])->one();
                        return $layanan ? $layanan->nama_layanan : "Tidak ada";
                    },
                ],
                'jumlah_point',
                'judul',
                'keterangan',
                'create_at',
            ],
        ]) ?>
        <div class="mt-3">
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

    </div>
</div>