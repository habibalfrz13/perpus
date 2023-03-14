<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alamat $model */

$this->title = 'Update Alamat: ' . $model->id_alamat;
$this->params['breadcrumbs'][] = ['label' => 'Alamats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alamat, 'url' => ['view', 'id_alamat' => $model->id_alamat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alamat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
