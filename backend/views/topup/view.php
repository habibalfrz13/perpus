<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Topup $model */

$this->title = $model->id_topup;
$this->params['breadcrumbs'][] = ['label' => 'Topups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="topup-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_topup' => $model->id_topup], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_topup' => $model->id_topup], [
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
            'id_topup',
            'id_user',
            'jumlah_topup',
            'jumlah_point',
            'keterangan',
        ],
    ]) ?>

</div>
