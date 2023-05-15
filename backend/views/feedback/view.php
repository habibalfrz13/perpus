<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Pelanggan;
use backend\models\OrderHistori;
use backend\models\Teknisi;
use backend\models\Layanan;

/** @var yii\web\View $this */
/** @var backend\models\Feedback $model */

$this->title = $model->id_feedback;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-body">
    <div class="feedback-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id_feedback' => $model->id_feedback], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id_feedback' => $model->id_feedback], [
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
                // 'id_feedback',
                'id_user' => [
                    'attribute' => 'id_user',
                    'label' => 'Nama Pelanggan',
                    'value' => function ($model) {
                        $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                        return $pelanggan ? $pelanggan->nama : "Pelanggan Belum Ada";
                    },
                ],
                [
                    'attribute' => 'id_order',
                    'label' => 'Jenis Layanan',
                    'value' => function ($model) {
                        $history = OrderHistori::find()->where(['id_order' => $model->id_order])->one();
                        $layanan = Layanan::find()->where(['id_layanan' => $history->jenis_layanan])->one();
                        return $layanan ? $layanan->nama_layanan : "Layanan Belum Ada";
                    },
                ],
                'id_teknisi' => [
                    'attribute' => 'id_teknisi',
                    'label' => 'Nama Teknisi',
                    'value' => function ($model) {
                        $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();
                        return $teknisi ? $teknisi->nama_lengkap : "Teknisi Belum Ada";
                    },
                ],
                'rating',
                'ulasan',
                [
                    'attribute' => 'foto_feedback',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img('../../backend/uploads/fotofeedback/' . $model->foto_feedback, ['alt' => 'Foto', 'class' => 'img-thumbnail', 'width' => '150px']);
                    }
                ],
                'create_at',
                'point',
            ],
        ]) ?>
        <div class="mt-3">
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>
    </div>
</div>