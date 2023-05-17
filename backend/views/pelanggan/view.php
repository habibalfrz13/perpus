<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Pelanggan $model */

$this->title = $model->id_pelanggan;
$this->params['breadcrumbs'][] = ['label' => 'Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-body">
    <div class="pelanggan-view">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php if (Yii::$app->user->identity->role == 'admin') : ?>
            <p>
                <?= Html::a('Update', ['update', 'id_pelanggan' => $model->id_pelanggan], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id_pelanggan' => $model->id_pelanggan], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        <?php endif; ?>

        <?php if (Yii::$app->user->identity->role == 'customer') : ?>
            <p>
                <?= Html::a('Update', ['update', 'id_pelanggan' => $model->id_pelanggan], ['class' => 'btn btn-primary']) ?>
            </p>
        <?php endif; ?>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_pelanggan',
                // 'id_user',
                'nama',
                'no_hp',
                'email:email',
                'point',
                'status',
                [
                    'attribute' => 'foto',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img('../../backend/uploads/foto/' . $model->foto, ['alt' => 'Foto', 'class' => 'img-thumbnail', 'width' => '150px']);
                    }
                ],
                // 'create_at',
                'kode_otp',
            ],
        ]) ?>

        <div class="mt-3">
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>
    </div>
</div>