<?php

use backend\models\NotifikasiOrder;
use backend\models\Pelanggan;
use backend\models\Layanan;
use backend\models\OrderDisplay;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiOrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Notifikasi Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifikasi-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <p>
            <?= Html::a('Create Notifikasi Order', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <div class="card card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Judul</th>
                        <th width="104" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($modelnotif as $data) {
                        $orderdisplay = OrderDisplay::find()->where(['id_order' => $data->id_order])->one();
                        $pelanggan = Pelanggan::find()->where(['id_user' => $orderdisplay->id_user])->one();
                        $layanan = Layanan::find()->where(['id_layanan' => $orderdisplay->jenis_layanan])->one();
                    ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $pelanggan->nama ?></td>
                            <td><?= $layanan->nama_layanan ?></td>
                            <td><?= $data->judul ?></td>
                            <td>
                                <a href="view?id=<?= $data->id ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'operator') : ?>
        <div class="card card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'id_order',
                    'judul',
                    'keterangan',
                    'create_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, NotifikasiOrder $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    <?php endif; ?>


</div>