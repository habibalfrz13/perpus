<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\KondisiAc $model */

$this->title = 'Update Kondisi Ac: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kondisi Acs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kondisi-ac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
