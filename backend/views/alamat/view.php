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
<div class="card card-body">
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
        <?php if (Yii::$app->user->identity->role == 'admin') : ?>
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
                    // 'status',
                    // 'create_at',
                    'id_kategori',
                ],
            ]) ?>
        <?php endif; ?>

        <?php if (Yii::$app->user->identity->role == 'customer') : ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id_alamat',
                    // 'id_user',
                    'provinsi',
                    'kota',
                    'kecamatan',
                    'alamat',
                    'kode_pos',
                    'latitude',
                    'longitude',
                    // 'status',
                    // 'create_at',
                    // 'id_kategori',
                ],
            ]) ?>
        <?php endif; ?>

    </div>
    <div class="mt-3">
        <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-dark">Back</a>
    </div>
</div>