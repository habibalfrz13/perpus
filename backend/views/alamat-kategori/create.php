<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\AlamatKategori $model */

$this->title = 'Create Alamat Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Alamat Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alamat-kategori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
