<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplay $model */

$this->title = $model->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Order Displays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-display-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_order' => $model->id_order], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_order' => $model->id_order], [
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
            // 'id_order',
            // 'id_user',
            'jumlah',
            'jenis_layanan',
            'detail',
            'masalah',
            'id_merk',
            'type_ac',
            'alamat',
            'jadwal_pengerjaan',
            'status',
            'tgl_pesan',
            // 'id_teknisi',
        ],
    ]) ?>

</div>