<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MerkAc $model */

$this->title = 'Update Merk Ac: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Merk Acs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="merk-ac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
