<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiPoint $model */

$this->title = 'Create Notifikasi Point';
$this->params['breadcrumbs'][] = ['label' => 'Notifikasi Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifikasi-point-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
