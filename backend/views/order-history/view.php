<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistori $model */

$this->title = $model->id_historis;
$this->params['breadcrumbs'][] = ['label' => 'Order Historis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-body">
    <div class="order-histori-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id_historis' => $model->id_historis], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id_historis' => $model->id_historis], [
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
                'id_historis',
                'id_user',
                'id_order',
                'jenis_layanan',
                'tanggal',
                'status',
            ],
        ]) ?>

        <div class="mt-3">
            <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-dark">Back</a>
        </div>
    </div>
</div>