<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Topup $model */

$this->title = 'Update Topup: ' . $model->id_topup;
$this->params['breadcrumbs'][] = ['label' => 'Topups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_topup, 'url' => ['view', 'id_topup' => $model->id_topup]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
