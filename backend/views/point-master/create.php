<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PointMaster $model */

$this->title = 'Create Point Master';
$this->params['breadcrumbs'][] = ['label' => 'Point Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="point-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
