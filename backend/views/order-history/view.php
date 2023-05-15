<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Feedback;
use backend\models\Invoice;
use backend\models\InvoiceDetail;
use backend\models\KondisAcorder;
use backend\models\Layanan;
use backend\models\OrderDisplay;
use backend\models\OrderHistori;
use SebastianBergmann\Invoker\Invoker;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistori $model */

$this->title = 'History Order';
$this->params['breadcrumbs'][] = ['label' => 'Order Historis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php
$modelfeedback = Feedback::find()->where(['id_order' => $model->id_order])->one();
$modelinvoice = Invoice::find()->where(['id_order' => $model->id_order])->one();
?>

<div class="card card-body">
    <div class="order-histori-view">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_historis',
                'id_user',
                'id_order',
                'jenis_layanan',
                'tanggal',
                'status',
            ],
        ]) ?>
    </div>
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


    <div class="mt-2 mb-2">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
    </div>
</div>