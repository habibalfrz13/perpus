<?php

use backend\models\Alamat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Pelanggan;
use backend\models\TbKecamatan;
use backend\models\TbKotaKabupaten;
use backend\models\TbProvinsi;

/** @var yii\web\View $this */
/** @var backend\models\AlamatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
if (!Yii::$app->user->isGuest) {
    // Mendapatkan model pengguna yang telah login
    $user = Yii::$app->user->identity;

    // Jika pengguna adalah admin, maka data yang ditampilkan tidak dibatasi
    if ($user->role == 'admin') {
        $searchModel->id_user = null;
    } else if ($user->role == 'operator') {
        $searchModel->id_user = null;
    }
    // Jika pengguna bukan admin dan operator, maka data yang ditampilkan dibatasi hanya pada data yang sesuai dengan akun mereka
    else {
        $searchModel->id_user = $user->id;
        $dataProvider->query->andWhere(['id_user' => $user->id]);
    }
}

$this->title = 'Alamats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alamat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 'admin' or 'customer') : ?>
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
                'provinsi' => [
                    'attribute' => 'provinsi',
                    'label' => 'Provinsi',
                    'value' => function ($model) {
                        $provinsi = TbProvinsi::find()->where(['id' => $model->provinsi])->one();
                        return $provinsi ? $provinsi->nama : "Tidak Ada Provinsi";
                    }
                ],
                'kota' => [
                    'attribute' => 'kota',
                    'label' => 'Kota/Kabupater',
                    'value' => function ($model) {
                        $kota = TbKotaKabupaten::find()->where(['id' => $model->kota])->one();
                        return $kota ? $kota->nama : "Tidak Ada kota";
                    }
                ],
                'kecamatan' => [
                    'attribute' => 'kecamatan',
                    'label' => 'Kecamatan',
                    'value' => function ($model) {
                        $kecamatan = TbKecamatan::find()->where(['id' => $model->kecamatan])->one();
                        return $kecamatan ? $kecamatan->nama : "Tidak Ada kecamatan";
                    }
                ],
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