<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PointMaster $model */

$this->title = 'Update Point Master: ' . $model->id_point;
$this->params['breadcrumbs'][] = ['label' => 'Point Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_point, 'url' => ['view', 'id_point' => $model->id_point]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="point-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
