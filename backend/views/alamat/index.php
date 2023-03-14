<?php

use backend\models\Alamat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\AlamatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alamats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alamat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Alamat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alamat',
            'id_user',
            'provinsi',
            'kota',
            'kecamatan',
            //'alamat',
            //'kode_pos',
            //'latitude',
            //'longitude',
            //'status',
            //'create_at',
            //'id_kategori',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alamat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_alamat' => $model->id_alamat]);
                 }
            ],
        ],
    ]); ?>


</div>
