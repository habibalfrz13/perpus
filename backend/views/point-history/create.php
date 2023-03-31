<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PointHistory $model */

$this->title = 'Create Point History';
$this->params['breadcrumbs'][] = ['label' => 'Point Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="point-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
