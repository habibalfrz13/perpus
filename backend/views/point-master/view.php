<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\PointMaster $model */

$this->title = 'Point';
$this->params['breadcrumbs'][] = ['label' => 'Point Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-body">
    <div class="point-master-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id_point' => $model->id_point], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id_point' => $model->id_point], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_point',
                'keterangan',
                'jumlah_ac',
                'jumlah_order',
                'jumlah_point',
            ],
        ]) ?>

    </div>
    <div class="mt-3">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
    </div>
</div>