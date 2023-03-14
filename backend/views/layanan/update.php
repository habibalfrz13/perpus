<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Layanan $model */

$this->title = 'Update Layanan: ' . $model->id_layanan;
$this->params['breadcrumbs'][] = ['label' => 'Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_layanan, 'url' => ['view', 'id_layanan' => $model->id_layanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="layanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
