<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PointKonversi $model */

$this->title = 'Update Point Konversi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Point Konversis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="point-konversi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
