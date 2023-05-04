<?php

use backend\models\Pelanggan;
use backend\models\Teknisi;
use backend\models\User;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// Memeriksa apakah pengguna telah login
if (!Yii::$app->user->isGuest) {
    // Mendapatkan model pengguna yang telah login
    $user = Yii::$app->user->identity;

    // Jika pengguna adalah admin, maka data yang ditampilkan tidak dibatasi
    if ($user->role == 'admin') {
        $searchModel->id = null;
    }
    // Jika pengguna bukan admin, maka data yang ditampilkan dibatasi hanya pada data yang sesuai dengan akun mereka
    else {
        $searchModel->id = $user->id;
        $dataProvider->query->andWhere(['id' => $user->id]);
    }
}

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3><?= Html::encode($this->title) ?></h3>

<p>
    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?php // echo $this->render('_search', ['model' => $searchModel]); 
?>


<div class="card card-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id User</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($model as $data) {
                $pelanggan = Pelanggan::find()->where(['id_user' => $data->id])->one();
                $teknisi = Teknisi::find()->where(['id_user' => $data->id])->one();

            ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>

                    <td><?= $data->id ?></td>
                    <td><?= $data->username ?></td>
                    <td><?php if ($pelanggan) {
                            echo $pelanggan->nama;
                        } else if ($teknisi) {
                            echo $teknisi->nama_lengkap;
                        } else {
                            echo $data->username;
                        }
                        ?></td>
                    <td><?= $data->role ?></td>
                    <td></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>