<?php

use backend\models\OrderHistori;
use backend\models\Teknisi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
if (!Yii::$app->user->isGuest) {
    // Mendapatkan model pengguna yang telah login
    $user = Yii::$app->user->identity;
    $teknisi = Teknisi::find()->where(['id_user' => $user->id])->one();
    // Jika pengguna adalah admin, maka data yang ditampilkan tidak dibatasi
    if ($user->role == 'admin') {
        $searchModel->id_user = null;
    } else if ($user->role == 'operator') {
        $searchModel->id_user = null;
    } else if ($user->role == 'teknisi') {
        $dataProvider->query->andWhere(['id_teknisi' => $teknisi->id_teknisi]);
    }
    // Jika pengguna bukan admin dan operator, maka data yang ditampilkan dibatasi hanya pada data yang sesuai dengan akun mereka
    else {
        $searchModel->id_user = $user->id;
        $dataProvider->query->andWhere(['id_user' => $user->id]);
    }
}

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

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <div class="card">
            <div class="card-body table-hover">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_historis',
                        // 'id_user',
                        // 'id_order',
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

    <?php if (Yii::$app->user->identity->role == 'customer') : ?>
        <div class="card">
            <div class="card-body table-hover">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id_historis',
                        'id_user',
                        'id_order',
                        'jenis_layanan',
                        'tanggal',
                        [
                            'attribute' => 'id_teknisi',
                            'label' => 'Teknisi',
                            'value' => function ($model) {
                                $teknisi = Teknisi::find()->where(['id_teknisi' => $model->id_teknisi])->one();
                                return isset($teknisi->nama_lengkap) ? $teknisi->nama_lengkap : 'Tidak Ada Teknisi';
                            }
                        ],

                        //'status',
                        [
                            'class' => ActionColumn::className(),
                            'template' => '{view}',
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
                        [
                            'attribute' => 'id_teknisi',
                            'value' => function ($model) {
                                return isset($model->id_teknisi) ? $model->id_teknisi : 'Teknisi tidak ada';
                            }
                        ],
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