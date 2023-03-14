<?php

use backend\models\OrderHistori;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Order Historis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-histori-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order Histori', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_historis',
            'id_user',
            'id_order',
            'jenis_layanan',
            'tanggal',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrderHistori $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_historis' => $model->id_historis]);
                 }
            ],
        ],
    ]); ?>


</div>
