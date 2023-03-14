<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistori $model */

$this->title = 'Create Order Histori';
$this->params['breadcrumbs'][] = ['label' => 'Order Historis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-histori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
