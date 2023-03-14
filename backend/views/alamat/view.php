<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Alamat $model */

$this->title = $model->id_alamat;
$this->params['breadcrumbs'][] = ['label' => 'Alamats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alamat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_alamat' => $model->id_alamat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_alamat' => $model->id_alamat], [
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
            'id_alamat',
            'id_user',
            'provinsi',
            'kota',
            'kecamatan',
            'alamat',
            'kode_pos',
            'latitude',
            'longitude',
            'status',
            'create_at',
            'id_kategori',
        ],
    ]) ?>

</div>
