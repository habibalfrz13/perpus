<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiPoint $model */

$this->title = 'Update Notifikasi Point: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notifikasi Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notifikasi-point-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
