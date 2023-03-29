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

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <p>
            <?= Html::a('Create Order Histori', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php if (Yii::$app->user->identity->role == 'customer') : ?>
        <div class="card">
            <div class="card-body table-hover">
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
                        'id_teknisi',
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
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'operator') : ?>
        <div class="card">
            <div class="card-body table-hover">
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
                        'id_teknisi',
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
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'teknisi') : ?>
        <div class="card">
            <div class="card-body table-hover">
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
                        'id_teknisi',
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
        </div>
    <?php endif; ?>
</div>