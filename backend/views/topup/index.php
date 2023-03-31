<?php

use backend\models\Topup;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TopupSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Topups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topup-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Topup', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_topup',
            'id_user',
            'jumlah_point',
            'keterangan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Topup $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_topup' => $model->id_topup]);
                }
            ],
        ],
    ]); ?>


</div>