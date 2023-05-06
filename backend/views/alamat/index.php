<?php

use backend\models\Alamat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Pelanggan;

/** @var yii\web\View $this */
/** @var backend\models\AlamatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alamats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alamat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <p>
            <?= Html::a('Create Alamat', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <div class="card card-body table-hover">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id_alamat',
                'id_user' => [
                    'attribute' => 'id_user',
                    'label' => 'Nama Pelanggan',
                    'value' => function ($model) {
                        $pelanggan = Pelanggan::find()->where(['id_user' => $model->id_user])->one();
                        return $pelanggan ? $pelanggan->nama : "Pelanggan Belum Ada";
                    },
                ],
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
</div>