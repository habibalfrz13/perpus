<?php

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
    <div>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'style' => 'width: 100%; border: 1px solid #ddd; padding: 10px;',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'username',
                'email',
                'status',
                'role',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, User $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>