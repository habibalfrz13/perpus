<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiOrder $model */

$this->title = 'Create Notifikasi Order';
$this->params['breadcrumbs'][] = ['label' => 'Notifikasi Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifikasi-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
