<?php

use backend\models\OrderDisplay;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplaySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Order Displays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-display-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order Display', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_order',
            'id_user',
            'jumlah',
            'jenis_layanan',
            'detail',
            //'masalah',
            //'id_merk',
            //'type_ac',
            //'alamat',
            //'jadwal_pengerjaan',
            //'status',
            //'tgl_pesan',
            //'id_teknisi',
            //'point_teknisi',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrderDisplay $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_order' => $model->id_order]);
                 }
            ],
        ],
    ]); ?>


</div>
