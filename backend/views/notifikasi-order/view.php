<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
                    'label' => 'Nama Pelanggan',
                    'value' => function ($model) {
                        return $model->nama_pelanggan; // Ganti "nama_pelanggan" dengan nama atribut yang sesuai di model Anda
                    }
                ],
                'judul',
                'keterangan',
                'create_at',
            ],
        ]) ?>

    </div>
    <div class="mt-3">
        <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-dark">Back</a>
    </div>
</div>