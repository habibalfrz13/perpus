<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Layanan $model */

$this->title = $model->id_layanan;
$this->params['breadcrumbs'][] = ['label' => 'Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-body">
    <div class="layanan-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id_layanan' => $model->id_layanan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id_layanan' => $model->id_layanan], [
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
                'id_layanan',
                'nama_layanan',
                'jenis_layanan',
                'deskripsi',
            ],
        ]) ?>

        <div class="mt-3">
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>
    </div>
</div>