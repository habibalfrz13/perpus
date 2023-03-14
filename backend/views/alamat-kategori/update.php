<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\AlamatKategori $model */

$this->title = 'Update Alamat Kategori: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alamat Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alamat-kategori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
