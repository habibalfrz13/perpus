<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplay $model */

$this->title = 'Update Order Display: ' . $model->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Order Displays', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_order, 'url' => ['view', 'id_order' => $model->id_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-display-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
