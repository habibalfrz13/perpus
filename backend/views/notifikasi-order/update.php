<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiOrder $model */

$this->title = 'Update Notifikasi Order: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notifikasi Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notifikasi-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
