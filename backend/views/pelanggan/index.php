<?php

use backend\models\Pelanggan;
use backend\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PelangganSearch $searchModel */
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
        $searchModel->username = $user->id;
        $dataProvider->query->andWhere(['id_user' => $user->id]);
    }
}

$this->title = 'Pelanggan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <p>
            <?= Html::a('Create Pelanggan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <div class="card card-body table-hover">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_pelanggan',
                    // 'id_user',
                    'nama',
                    'no_hp',
                    'email:email',
                    'foto',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Pelanggan $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_pelanggan' => $model->id_pelanggan]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'customer') : ?>
        <div class="card card-body table-hover">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_pelanggan',
                    // 'id_user',
                    'nama',
                    'no_hp',
                    'email:email',
                    'foto',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Pelanggan $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_pelanggan' => $model->id_pelanggan]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'operator') : ?>
        <div class="card card-body table-hover">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_pelanggan',
                    // 'id_user',
                    'nama',
                    'no_hp',
                    'email:email',
                    'foto',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Pelanggan $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_pelanggan' => $model->id_pelanggan]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    <?php endif; ?>


</div>