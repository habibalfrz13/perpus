<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderKondisi $model */

$this->title = 'Create Order Kondisi';
$this->params['breadcrumbs'][] = ['label' => 'Order Kondisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-kondisi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
