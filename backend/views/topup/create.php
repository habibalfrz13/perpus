<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Topup $model */

$this->title = 'Create Topup';
$this->params['breadcrumbs'][] = ['label' => 'Topups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
