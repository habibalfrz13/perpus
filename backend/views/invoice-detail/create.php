<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InvoiceDetail $model */

$this->title = 'Create Invoice Detail';
$this->params['breadcrumbs'][] = ['label' => 'Invoice Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
