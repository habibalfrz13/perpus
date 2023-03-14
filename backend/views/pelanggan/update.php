<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Pelanggan $model */

$this->title = 'Update Pelanggan: ' . $model->id_pelanggan;
$this->params['breadcrumbs'][] = ['label' => 'Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelanggan, 'url' => ['view', 'id_pelanggan' => $model->id_pelanggan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelanggan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
