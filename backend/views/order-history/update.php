<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistori $model */

$this->title = 'Update Order Histori: ' . $model->id_historis;
$this->params['breadcrumbs'][] = ['label' => 'Order Historis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_historis, 'url' => ['view', 'id_historis' => $model->id_historis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-histori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
