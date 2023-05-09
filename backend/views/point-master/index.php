<?php

use backend\models\PointMaster;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PointMasterSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Point Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="point-master-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Point Master', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <div class="card card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_point',
                    'keterangan',
                    'jumlah_ac',
                    'jumlah_order',
                    'jumlah_point',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, PointMaster $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_point' => $model->id_point]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'operator') : ?>
        <div class="card card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_point',
                    'keterangan',
                    'jumlah_ac',
                    'jumlah_order',
                    'jumlah_point',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, PointMaster $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_point' => $model->id_point]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    <?php endif; ?>


</div>