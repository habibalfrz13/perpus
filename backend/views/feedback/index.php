<?php

use backend\models\Feedback;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\FeedbackSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <p>
            <?= Html::a('Create Feedback', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php if (Yii::$app->user->identity->role == 'admin') : ?>
        <div class="card table-hover">
            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_feedback',
                        'id_user',
                        'id_order',
                        'id_teknisi',
                        'rating',
                        'ulasan',
                        //'create_at',
                        //'point',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Feedback $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_feedback' => $model->id_feedback]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'operator') : ?>
        <div class="card table-hover">
            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_feedback',
                        'id_user',
                        'id_order',
                        'id_teknisi',
                        'rating',
                        'ulasan',
                        //'create_at',
                        //'point',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Feedback $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_feedback' => $model->id_feedback]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'teknisi') : ?>
        <div class="card table-hover">
            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_feedback',
                        // 'id_user',
                        'id_order',
                        // 'id_teknisi',
                        'rating',
                        'ulasan',
                        //'create_at',
                        //'point',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Feedback $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_feedback' => $model->id_feedback]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'customer') : ?>
        <div class="card table-hover">
            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_feedback',
                        // 'id_user',
                        'id_order',
                        // 'id_teknisi',
                        'rating',
                        'ulasan',
                        //'create_at',
                        'point',
                    ],
                ]); ?>
            </div>
        </div>
    <?php endif; ?>


</div>