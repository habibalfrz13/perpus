<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderKondisi $model */

$this->title = 'Update Order Kondisi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Kondisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-kondisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
