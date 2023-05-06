<?php

use backend\models\Layanan;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Pelanggan;
use backend\models\OrderDisplay;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiOrder $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notifikasi Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-body">
    <div class="notifikasi-order-view">

        <h1><?= Html::encode($this->title) ?></h1>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'id_order',
                    'label' => 'Nama Pelanggan',
                    'value' => function ($model) {
                        $history = OrderDisplay::find()->where(['id_order' => $model->id_order])->one();
                        $pelanggan = Pelanggan::find()->where(['id_user' => $history->id_user])->one();
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
                'judul',
                'keterangan',
                'create_at',
            ],
        ]) ?>
    </div>

    <div class="mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
    </div>
</div>