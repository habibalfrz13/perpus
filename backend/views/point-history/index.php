<?php

use backend\models\PointHistory;
use backend\models\Teknisi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PointHistorySearch $searchModel */
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
    }
    // Jika pengguna bukan admin dan operator, maka data yang ditampilkan dibatasi hanya pada data yang sesuai dengan akun mereka
    else {
        $dataProvider->query->andWhere(['id_user' => $user->id]);
    }
}

$this->title = 'Point Histories';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="point-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <p>
            <?= Html::a('Create Point History', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <div class="card card-body">
        <h2>Total Point</h2>
        <h4><?php echo $teknisi->point ?></h4>
    </div>

    <div class="card card-body">
        <h2>History Point</h2>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'id_user',
                'point',
                'created_at',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, PointHistory $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],

            ],
        ]); ?>
    </div>

</div>