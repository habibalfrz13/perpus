<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplay $model */

$this->title = 'Create Order Display';
$this->params['breadcrumbs'][] = ['label' => 'Order Displays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-display-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>